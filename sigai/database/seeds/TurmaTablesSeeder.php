<?php

use Illuminate\Database\Seeder;

use App\Models\UnidadeCurricular;
use App\Models\Turma;

class TurmaTablesSeeder extends Seeder {
    public function run()
    {
        DB::table('turmas')->truncate();

        $csv = new CsvReader(base_path() . "/fixtures/turmas.csv", true, ',');

        while (($row = $csv->nextRow()) !== NULL) {
            $turma = new Turma;
            $turma->nome        = trim($row['nome_turma']);
            $turma->data_inicio = trim($row['data_inicio']);
            $turma->data_fim    = trim($row['data_fim']);

            $uc = UnidadeCurricular::where('nome', trim($row['nome_unidade']))->first();
            $turma->unidadeCurricular()->associate($uc);

            $turma->save();
        }
    }
}