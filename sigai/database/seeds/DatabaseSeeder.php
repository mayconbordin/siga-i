<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call('RolePermissionTablesSeeder');
		$this->command->info('Tabelas de usuários, roles e permissions populadas!');

		$this->call('AlunoTablesSeeder');
		$this->command->info('Tabela alunos populada!');
		
		$this->call('UsuarioTablesSeeder');
		$this->command->info('Tabela usuários (professores) populada!');
		
		$this->call('CursoTablesSeeder');
		$this->command->info('Tabela cursos populada!');
		
		$this->call('ProfessorTablesSeeder');
		$this->command->info('Tabela professores populada!');
		
		$this->call('UnidadeCurricularTablesSeeder');
		$this->command->info('Tabela unidades curriculares populada!');
		
		$this->call('TurmaTablesSeeder');
		$this->command->info('Tabela turmas populada!');

		$this->call('CursoAlunoTablesSeeder');
		$this->command->info('Tabela cursos_alunos populada!');
		
		$this->call('AlunoTurmaTablesSeeder');
		$this->command->info('Tabela alunos_turmas populada!');

		$this->call('CursoUnidadeCurricularTablesSeeder');
		$this->command->info('Tabela cursos_unidades_curriculares populada!');
		
		$this->call('ProfessorTurmaTablesSeeder');
		$this->command->info('Tabela professores_turmas populada!');

		$this->call('AulaTablesSeeder');
		$this->command->info('Tabela aulas populada!');
		
		$this->call('ChamadaTablesSeeder');
		$this->command->info('Tabela chamadas populada!');

        // OAuth tables
        // ----------------------------------------------------------
        $this->call('OAuthScopesTableSeeder');
        $this->command->info('Tabela oauth_scopes populada!');

        $this->call('OAuthClientsTableSeeder');
        $this->command->info('Tabela oauth_clients populada!');

		
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}