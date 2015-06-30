<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class OAuthScopesTableSeeder extends Seeder {
    public function run()
    {
        DB::table('oauth_scopes')->truncate();

        $csv = new CsvReader(base_path() . "/fixtures/oauth_scopes.csv", true, ',');

        while (($row = $csv->nextRow()) !== NULL) {
            $datetime = Carbon::now();

            $scope = [
                'id'          => trim($row['id']),
                'description' => trim($row['description']),
                'created_at'  => $datetime,
                'updated_at'  => $datetime
            ];

            DB::table('oauth_scopes')->insert($scope);
        }
    }
}