<?php

use Illuminate\Database\Seeder;
use App\Utils\CsvReader;

use App\Repositories\Eloquent\AlunoRepository;
use App\Exceptions\NotFoundError;
use App\Models\Curso;

class CursoAlunoTablesSeeder extends Seeder {
    protected $alunoRepository;

    public function __construct()
    {
        $this->alunoRepository = new AlunoRepository();
    }

    public function run()
    {
        DB::table('cursos_alunos')->truncate();

        $csv = new CsvReader(base_path() . "/fixtures/cursos_alunos.csv", true, ',');

        while (($row = $csv->nextRow()) !== NULL) {
            try {
                $aluno = $this->alunoRepository->findByMatricula(trim($row['matricula_aluno']));
            } catch (NotFoundError $e) {
                $this->command->error("Matricula do aluno ('".$row['matricula_aluno']."') inválida.");
                continue;
            }

            try {
                $curso = Curso::where('nome', trim($row['nome_curso']))->first();

            } catch (NotFoundError $e) {
                $this->command->error("Curso ('".$row['nome_curso']."') inválido.");
                continue;
            }

            $curso->alunos()->attach($aluno);
        }
    }
}