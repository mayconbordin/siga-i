<?php

use Illuminate\Database\Seeder;

use App\Models\DispositivoAluno;
use App\Models\TipoDispositivoAluno;
use App\Models\Aluno;

use Carbon\Carbon;

class DispositivosAlunoTableSeeder extends Seeder {
    public function run()
    {
        DB::table('dispositivos_aluno')->truncate();
        DB::table('tipos_dispositivos_aluno')->truncate();

        $csv = new CsvReader(base_path() . "/fixtures/dispositivos_aluno.csv", true, ',');

        while (($row = $csv->nextRow()) !== NULL) {
            $tipo = TipoDispositivoAluno::where('nome', trim($row['tipo']))->first();

            if ($tipo == null) {
                $tipo = new TipoDispositivoAluno;
                $tipo->nome = trim($row['tipo']);
                $tipo->save();
            }

            $aluno = Aluno::find(trim($row['aluno']));

            $dispositivo = new DispositivoAluno;
            $dispositivo->codigo = trim($row['codigo']);
            $dispositivo->tipo()->associate($tipo);
            $dispositivo->aluno()->associate($aluno);
            $dispositivo->save();
        }
    }
}