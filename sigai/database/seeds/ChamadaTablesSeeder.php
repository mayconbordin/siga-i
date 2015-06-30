<?php

use Illuminate\Database\Seeder;

use App\Repositories\Eloquent\AlunoRepository;
use App\Exceptions\NotFoundError;
use App\Models\Aula;
use App\Models\Chamada;

class ChamadaTablesSeeder extends Seeder {
    protected $alunoRepository;

    public function __construct()
    {
        $this->alunoRepository = new AlunoRepository();
    }

    public function run()
    {
        DB::table('chamadas')->truncate();

        $csv = new CsvReader(base_path() . "/fixtures/chamadas.csv", true, ',');

        while (($row = $csv->nextRow()) !== NULL) {
            try {
                $aluno = $this->alunoRepository->findByMatricula(trim($row['aluno_matricula']));
            } catch (NotFoundError $e) {
                $this->command->error("Aluno matrícula ('".$row['aluno_matricula']."') inválido.");
                continue;
            }

            try {
                $aula = Aula::where('data', trim($row['data_aula']))->first();
            } catch (NotFoundError $e) {
                $this->command->error("Aula na data ('".$row['data_aula']."') inválida.");
                continue;
            }

            $chamada = new Chamada;
            $chamada->aluno()->associate($aluno);
            $chamada->aula()->associate($aula);

            $chamada->p1 = (trim($row['p1']) == 0) ? false : true;
            $chamada->p2 = (trim($row['p2']) == 0) ? false : true;
            $chamada->p3 = (trim($row['p3']) == 0) ? false : true;
            $chamada->p4 = (trim($row['p4']) == 0) ? false : true;

            $chamada->save();
        }
    }
}