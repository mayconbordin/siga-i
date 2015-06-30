<?php

use Illuminate\Database\Seeder;

use App\Models\UnidadeCurricular;

class UnidadeCurricularTablesSeeder extends Seeder {
    public function run()
    {
        DB::table('unidades_curriculares')->truncate();

        $csv = new CsvReader(base_path() . "/fixtures/unidades_curriculares.csv", true, ',');

        while (($row = $csv->nextRow()) !== NULL) {
            $uc = new UnidadeCurricular();
            $uc->nome = trim($row['nome']);
            $uc->carga_horaria = trim($row['carga_horaria']);
            $uc->sigla = trim($row['sigla']);
            $uc->save();
        }
    }
}