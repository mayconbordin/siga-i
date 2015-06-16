<?php

use Illuminate\Database\Seeder;

use App\Repositories\Eloquent\ProfessorRepository;
use App\Exceptions\NotFoundError;
use App\Models\Turma;

class ProfessorTurmaTablesSeeder extends Seeder {
    protected $professorRepository;

    public function __construct()
    {
        $this->professorRepository = new ProfessorRepository();
    }

    public function run()
    {
        DB::table('professores_turmas')->truncate();

        $csv = new CsvReader(base_path() . "/data/professores_turmas.csv", true, ',');

        while (($row = $csv->nextRow()) !== NULL) {
            try {
                $professor = $this->professorRepository->findByMatricula(trim($row['matricula_professor']));
            } catch (NotFoundError $e) {
                $this->command->error("Professor com matrícula ('".$row['matricula_professor']."') inválido.");
                continue;
            }

            try {
                $turma = Turma::where('nome', trim($row['nome_turma']))->first();
            } catch (NotFoundError $e) {
                $this->command->error("Turma ('".$row['nome_turma']."') inválida.");
                continue;
            }

            $turma->professores()->attach($professor);
        }
    }
}