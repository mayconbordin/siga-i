<?php namespace App\Services;

use App\Models\Agenda;
use App\Repositories\Contracts\AulaRepositoryContract;
use App\Repositories\Contracts\ProfessorRepositoryContract;
use App\Services\Contracts\AgendaServiceContract;

use Carbon\Carbon;

class AgendaService implements AgendaServiceContract
{
    protected $aulaRepository;
    protected $professorRepository;

    public function __construct(AulaRepositoryContract $aulaRepository, ProfessorRepositoryContract $professorRepository)
    {
        $this->aulaRepository      = $aulaRepository;
        $this->professorRepository = $professorRepository;
    }

    public function getAgenda(array $data)
    {
        $matricula = array_get($data, 'matricula', null);
        $month     = array_get($data, 'month', null);
        $year      = array_get($data, 'year', null);

        if ($year == null) {
            $year = Carbon::now()->year;
        }

        if ($month == null) {
            $month = Carbon::now()->month;
        }

        if ($matricula == null) {
            $professor = $professorId = null;
        } else {
            $professor = $this->professorRepository->findByMatricula($matricula);
            $professorId = $professor->id;
        }

        $aulas = $this->aulaRepository->findAllByProfessorAndMonth($professorId, $month, $year);
        $date = Carbon::create($year, $month, 1);

        $agenda = [];

        for ($day=1; $day<=$date->lastOfMonth()->day; $day++) {
            $agenda[$day] = new Agenda;
            $agenda[$day]->data  = Carbon::create($year, $month, $day);
        }

        foreach ($aulas as $aula) {
            $agenda[$aula->data->day]->addAula($aula);
        }

        return $agenda;
    }
}