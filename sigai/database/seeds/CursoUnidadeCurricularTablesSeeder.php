<?php

use Illuminate\Database\Seeder;

use App\Exceptions\NotFoundError;
use App\Models\Curso;
use App\Models\UnidadeCurricular;

class CursoUnidadeCurricularTablesSeeder extends Seeder {
    public function run()
    {
        DB::table('cursos_unidades_curriculares')->truncate();

        $csv = new CsvReader(base_path() . "/data/cursos_unidades_curriculares.csv", true, ',');

        while (($row = $csv->nextRow()) !== NULL) {
            try {
                $curso = Curso::where('nome', trim($row['nome_curso']))->first();
            } catch (NotFoundError $e) {
                $this->command->error("Curso ('".$row['nome_curso']."') inválido.");
                continue;
            }

            try {
                $uc = UnidadeCurricular::where('nome', trim($row['nome_unidade']))->first();
            } catch (NotFoundError $e) {
                $this->command->error("Unidade curricular ('".$row['nome_unidade']."') inválida.");
                continue;
            }

            $curso->unidadesCurriculares()->attach($uc);
        }
    }
}