<?php

use Illuminate\Database\Seeder;
use App\Utils\CsvReader;
use App\Models\Dispositivo;
use App\Models\TipoDispositivo;
use App\Models\User;

use Carbon\Carbon;

class DispositivosTableSeeder extends Seeder {
    public function run()
    {
        DB::table('dispositivos')->truncate();

        $csv = new CsvReader(base_path() . "/fixtures/dispositivos.csv", true, ',');

        while (($row = $csv->nextRow()) !== NULL) {
            $tipo = TipoDispositivo::where('nome', trim($row['tipo']))->first();

            if ($tipo == null) {
                $tipo = new TipoDispositivo;
                $tipo->nome = trim($row['tipo']);
                $tipo->save();
            }

            $usuario = User::find(trim($row['usuario']));

            $dispositivo = new Dispositivo;
            $dispositivo->codigo = trim($row['codigo']);
            $dispositivo->tipo()->associate($tipo);
            $dispositivo->usuario()->associate($usuario);
            $dispositivo->save();
        }
    }
}