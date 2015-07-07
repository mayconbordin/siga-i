<?php namespace App\Services;

use App\Exceptions\NotFoundError;
use App\Models\Aluno;
use App\Models\Aula;
use App\Repositories\Contracts\AlunoRepositoryContract;
use App\Repositories\Contracts\AulaRepositoryContract;
use App\Repositories\Contracts\ChamadaRepositoryContract;
use App\Services\Contracts\ChamadaServiceContract;

use Carbon\Carbon;

use Log;

class ChamadaService implements ChamadaServiceContract
{
    protected $repository;
    protected $aulaRepository;
    protected $alunoRepository;

    protected $tolerance = 20;

    public function __construct(ChamadaRepositoryContract $repository, AulaRepositoryContract $aulaRepository,
                                AlunoRepositoryContract $alunoRepository)
    {
        $this->repository      = $repository;
        $this->aulaRepository  = $aulaRepository;
        $this->alunoRepository = $alunoRepository;
    }

    public function saveSingleChamada(array $data)
    {
        $cliendId  = array_get($data, 'device_id');
        $cardId    = array_get($data, 'card_id');
        $timestamp = array_get($data, 'timestamp', null);

        if ($timestamp == null) {
            $timestamp = Carbon::now();
        } else {
            $timestamp = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp);
        }

        $currentAula = null;

        // pega lista de aulas que batem com a combinação de código do cliente, cartão e data
        $aulas = $this->aulaRepository->findAulaByAlunoDeviceAndAmbienteDeviceAndData($cliendId, $cardId, $timestamp);

        // pega da lista de aulas a primeira que está dentro do horário
        // o início da aula é decrescido de 20 minutos, ie o aluno pode entrar até 20 minutos antes
        foreach ($aulas as $aula) {
            $start = $this->mergeDataAndTime($aula->data, $aula->horario_inicio);
            $end   = $this->mergeDataAndTime($aula->data, $aula->horario_fim);

            if ($timestamp->between($start->copy()->subMinutes($this->tolerance), $end)) {
                $currentAula = $aula;
                break;
            }
        }

        if ($currentAula == null) {
            return false;
        }

        // encontrada um aula válida para a chamada
        // agora precisa definir para quais períodos ela será feita
        $durationAula    = $end->diffInMinutes($start);
        $durationPeriodo = $durationAula/4;
        $timeLeft        = $end->diffInMinutes($timestamp);


        Log::info("Aula tem duração de $durationAula minutos.");
        Log::info("$timeLeft minutos sobrando para fim da aula.");
        Log::info("Entre " . ($durationAula + $this->tolerance)        . " e " . ($durationAula - $this->tolerance)        . " = 1 e 2");
        Log::info("Entre " . ($durationAula - $this->tolerance)        . " e " . ($durationPeriodo * 3 - $this->tolerance) . " = 2");
        Log::info("Entre " . ($durationPeriodo * 2 + $this->tolerance) . " e " . ($durationPeriodo * 2 - $this->tolerance) . " = 3 e 4");
        Log::info("Entre " . ($durationPeriodo * 2 - $this->tolerance) . " e " . ($durationPeriodo - $this->tolerance)     . " = 4");


        $aluno = $this->alunoRepository->findByDispositivo($cardId);
        $periods = [false, false, false, false];

        try {
            $chamada = $this->repository->findByAulaAndAluno($currentAula->id, $aluno->id);
            $periods = [$chamada->p1, $chamada->p2, $chamada->p3, $chamada->p4];
        } catch (NotFoundError $e) { }


        // Entrada no início da aula
        // Pode entrar de 20min antes até 20min depois para contar os dois períodos
        if ($timeLeft <= ($durationAula + $this->tolerance) && $timeLeft >= ($durationAula - $this->tolerance)) {
            Log::info("Faz chamada do período 1 e 2");
            $periods[0] = true;
            $periods[1] = true;
        }

        // Entrada no segundo período de aula
        // Se entrou com mais de 20min depois do início até 20min depois do início do segundo período
        else if ($timeLeft < ($durationAula - $this->tolerance) && $timeLeft >= ($durationPeriodo * 3 - $this->tolerance)) {
            Log::info("Faz chamada do período 2");
            $periods[1] = true;
        }

        // Entrada depois do intervalo
        // Entre 20min antes do início do terceiro período até 20min depois
        else if ($timeLeft <= ($durationPeriodo * 2 + $this->tolerance) && $timeLeft >= ($durationPeriodo * 2 - $this->tolerance)) {
            Log::info("Faz chamada do período 3 e 4");
            $periods[2] = true;
            $periods[3] = true;
        }

        // Entrada depois do terceiro período
        // Entre 20min depois do início do terceiro período até 20min depois do início do quarto período
        else if ($timeLeft <= ($durationPeriodo * 2 - $this->tolerance) && $timeLeft >= ($durationPeriodo - $this->tolerance)) {
            Log::info("Faz chamada do período 4");
            $periods[3] = true;
        }

        else {
            Log::info("Não faz chamada");
            return false;
        }

        $this->repository->insertOrUpdate($aluno, $periods, $currentAula);

        return true;
    }

    public function saveOrUpdate(Aula $aula, Aluno $aluno, array $periods)
    {
        return $this->repository->insertOrUpdate($aluno, $periods, $aula);
    }

    protected function mergeDataAndTime(Carbon $data, Carbon $time)
    {
        return Carbon::create($data->year, $data->month, $data->day, $time->hour, $time->minute, $time->second);
    }
}