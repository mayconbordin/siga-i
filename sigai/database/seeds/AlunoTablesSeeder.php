<?php

use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\User;
use App\Models\Aluno;

class AlunoTablesSeeder extends Seeder {
    public function run()
    {
        DB::table('alunos')->truncate();

        $csv = new CsvReader(base_path() . "/data/alunos.csv", true, ',');

        $role = Role::where('name', 'aluno')->first();

        while (($row = $csv->nextRow()) !== NULL) {
            $usuario = new User;
            $usuario->matricula = $row['matricula'];
            $usuario->nome = $row['nome'];
            $usuario->email = str_replace(" ", "_", strtolower($row['nome'])) . "@gmail.com";
            $usuario->password = Hash::make('12345');
            $usuario->save();

            $usuario->attachRole($role);

            $aluno = new Aluno();
            $aluno->id = $usuario->id;
            $aluno->save();
        }
    }
}