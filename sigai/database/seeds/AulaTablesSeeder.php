<?php

use Illuminate\Database\Seeder;
use App\Utils\CsvReader;

use App\Models\Aula;
use App\Models\Turma;

use Carbon\Carbon;

class AulaTablesSeeder extends Seeder {
    public function run()
    {
        DB::table('aulas')->truncate();

        $csv = new CsvReader(base_path() . "/fixtures/aulas.csv", true, ',');

        while (($row = $csv->nextRow()) !== NULL) {
            $aula = new Aula;
            $aula->data = Carbon::createFromFormat('Y-m-d', $row['data_aula']);
            $aula->conteudo = trim($row['conteudo']);
            $aula->obs = trim($row['obs']);
            $aula->status = trim($row['status_aula']);
            $aula->ensino_a_distancia = ($row['ensino_a_distancia'] == 0) ? false : true;

            $turma = Turma::with('professores')->where('nome', trim($row['nome_turma']))->first();
            $aula->turma()->associate($turma);

            $professor = $turma->professores[0];
            if ($professor != null) {
                $aula->professor()->associate($professor);
            }

            $aula->horario_inicio = $turma->horario_inicio;
            $aula->horario_fim    = $turma->horario_fim;

            $aula->save();
        }
    }
}