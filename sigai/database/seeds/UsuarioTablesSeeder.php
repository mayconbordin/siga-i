<?php

use Illuminate\Database\Seeder;
use App\Utils\CsvReader;
use App\Models\User;
use App\Models\Role;

class UsuarioTablesSeeder extends Seeder {
    public function run()
    {
        $csv = new CsvReader(base_path() . "/fixtures/professores.csv", true, ',');

        while (($row = $csv->nextRow()) !== NULL) {
            $usuario = new User;
            $usuario->matricula = $row['matricula'];
            $usuario->nome = $row['nome'];
            $usuario->email = str_replace(" ", "_", strtolower($row['nome'])) . "@gmail.com";
            $usuario->password = Hash::make('12345');

            $usuario->save();
        }


        $csv = new CsvReader(base_path() . "/fixtures/usuarios.csv", true, ',');

        while (($row = $csv->nextRow()) !== NULL) {
            $usuario = new User;
            $usuario->matricula = $row['matricula'];
            $usuario->nome = $row['nome'];
            $usuario->email = $row['email'];
            $usuario->password = Hash::make($row['senha']);
            $usuario->save();

            $role = Role::where('name', $row['tipo'])->first();
            $usuario->attachRole($role);
        }
    }
}