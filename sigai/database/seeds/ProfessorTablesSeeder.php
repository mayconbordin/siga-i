<?php

use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\Professor;
use App\Models\Curso;
use App\Repositories\Eloquent\UsuarioRepository;

class ProfessorTablesSeeder extends Seeder {
    protected $usuarioRepository;

    public function __construct()
    {
        $this->usuarioRepository = new UsuarioRepository();
    }

    public function run()
    {
        DB::table('professores')->truncate();

        $csv = new CsvReader(base_path() . "/data/professores.csv", true, ',');

        $profRole  = Role::where('name', 'professor')->first();
        $coordRole = Role::where('name', 'coordenador')->first();

        while (($row = $csv->nextRow()) !== NULL) {
            $usuario = $this->usuarioRepository->findByMatricula($row['matricula']);
            $usuario->attachRole($profRole);

            if ($row['tipo'] == 'coordenador') {
                $usuario->attachRole($coordRole);
            }

            $professor = new Professor();
            $professor->id = $usuario->id;

            $curso = Curso::where('nome', $row['curso_origem'])->first();
            if ($curso == null) {
                $this->command->error("Curso de origem '".$row['curso_origem']."' não existe");
                continue;
            }

            $professor->cursoOrigem()->associate($curso);

            $professor->save();
        }
    }
}