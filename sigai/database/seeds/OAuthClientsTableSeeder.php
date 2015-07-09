<?php

use Carbon\Carbon;
use App\Utils\CsvReader;
use Illuminate\Database\Seeder;
use App\Models\TipoDispositivo;

class OAuthClientsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('oauth_clients')->truncate();
        DB::table('tipos_dispositivos')->truncate();

        $csv = new CsvReader(base_path() . "/fixtures/oauth_clients.csv", true, ',');

        while (($row = $csv->nextRow()) !== NULL) {
            $id = trim($row['id']);
            $datetime = Carbon::now();

            $tipo = TipoDispositivo::where('nome', trim($row['tipo']))->first();

            if ($tipo == null) {
                $tipo = new TipoDispositivo;
                $tipo->nome = trim($row['tipo']);
                $tipo->save();
            }

            $scope = [
                'id'          => $id,
                'secret'      => trim($row['secret']),
                'name'        => trim($row['name']),
                'tipo_dispositivo_id' => $tipo->id,
                'created_at'  => $datetime,
                'updated_at'  => $datetime
            ];

            DB::table('oauth_clients')->insert($scope);

            $scopes = explode(',', trim($row['scopes']));

            foreach ($scopes as $scope) {
                $s = DB::table('oauth_scopes')->where('id', trim($scope))->first();

                if ($s == null) {
                    $this->command->error("Escopo $scope não foi encontrado.");
                    continue;
                }

                DB::table('oauth_client_scopes')->insert([
                    'client_id'   => $id,
                    'scope_id'    => $scope,
                    'created_at'  => $datetime,
                    'updated_at'  => $datetime
                ]);
            }
        }
    }
}