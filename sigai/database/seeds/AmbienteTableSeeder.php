<?php

use Illuminate\Database\Seeder;

use App\Models\Ambiente;
use App\Models\TipoAmbiente;

use Carbon\Carbon;

class AmbienteTableSeeder extends Seeder {
    public function run()
    {
        DB::table('ambientes')->truncate();
        DB::table('tipos_ambiente')->truncate();

        $csv = new CsvReader(base_path() . "/fixtures/ambientes.csv", true, ',');

        while (($row = $csv->nextRow()) !== NULL) {
            $tipo = TipoAmbiente::where('nome', trim($row['tipo']))->first();

            if ($tipo == null) {
                $tipo = new TipoAmbiente;
                $tipo->nome = trim($row['tipo']);
                $tipo->save();
            }

            $ambiente = new Ambiente;
            $ambiente->nome = trim($row['nome']);
            $ambiente->tipo()->associate($tipo);
            $ambiente->save();
        }
    }
}