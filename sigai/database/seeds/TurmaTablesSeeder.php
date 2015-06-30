<?php

use Illuminate\Database\Seeder;

use App\Models\UnidadeCurricular;
use App\Models\Turma;
use App\Models\Ambiente;

class TurmaTablesSeeder extends Seeder {
    public function run()
    {
        DB::table('turmas')->truncate();

        $csv = new CsvReader(base_path() . "/fixtures/turmas.csv", true, ',');

        while (($row = $csv->nextRow()) !== NULL) {
            $ambiente = Ambiente::where('nome', trim($row['ambiente']))->first();

            if ($ambiente == null) {
                $this->command->error("O ambiente ".$row['ambiente']." não existe.");
                continue;
            }

            $turma = new Turma;
            $turma->nome           = trim($row['nome_turma']);
            $turma->data_inicio    = trim($row['data_inicio']);
            $turma->data_fim       = trim($row['data_fim']);
            $turma->horario_inicio = trim($row['horario_inicio']);
            $turma->horario_fim    = trim($row['horario_fim']);

            $turma->ambienteDefault()->associate($ambiente);

            $uc = UnidadeCurricular::where('nome', trim($row['nome_unidade']))->first();
            $turma->unidadeCurricular()->associate($uc);

            $turma->save();
        }
    }
}