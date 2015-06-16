<?php

use Illuminate\Database\Seeder;

use App\Models\Curso;
use App\Exceptions\NotFoundError;
use App\Repositories\Eloquent\UsuarioRepository;

class CursoTablesSeeder extends Seeder {

    protected $usuarioRepository;

    public function __construct()
    {
        $this->usuarioRepository = new UsuarioRepository();
    }

    public function run()
    {
        DB::table('cursos')->truncate();

        $csv = new CsvReader(base_path() . "/data/cursos.csv", true, ',');

        while (($row = $csv->nextRow()) !== NULL) {
            $curso = new Curso;
            $curso->nome = $row['nome'];
            $curso->sigla = $row['sigla'];

            try {
                $coordenador = $this->usuarioRepository->findByMatricula($row['coordenador']);
            } catch (NotFoundError $e) {
                $this->command->error($e->getMessage());
                continue;
            }

            $curso->coordenador()->associate($coordenador);
            $curso->save();
        }
    }
}