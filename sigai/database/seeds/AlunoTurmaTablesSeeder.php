<?php

use Illuminate\Database\Seeder;

use App\Repositories\Eloquent\AlunoRepository;
use App\Models\Turma;
use App\Models\Aluno;
use App\Exceptions\NotFoundError;

class AlunoTurmaTablesSeeder extends Seeder {
    protected $alunoRepository;

    public function __construct()
    {
        $this->alunoRepository = new AlunoRepository();
    }

    public function run()
    {
        DB::table('alunos_turmas')->truncate();

        $csv = new CsvReader(base_path() . "/data/alunos_turmas.csv", true, ',');

        while (($row = $csv->nextRow()) !== NULL) {
            try {
                $aluno = $this->alunoRepository->findByMatriculaWith(trim($row['aluno_matricula']), ['cursos']);
                $turma = Turma::where('nome', trim($row['nome_turma']))->first();
            } catch (NotFoundError $e) {
                $this->command->error("Matricula do aluno ('".$row['aluno_matricula']."') ".
                    "ou turma ('".$row['nome_turma']."') inválidos");
                continue;
            }

            $status = trim($row['status_aluno']);

            if ($status == 'NULL') {
                $status = Aluno::STATUS_NORMAL;
            }

            $curso = $aluno->cursos[0];

            $turma->alunos()->attach($aluno, ['status' => $status, 'curso_origem_id' => $curso->id]);
        }
    }
}