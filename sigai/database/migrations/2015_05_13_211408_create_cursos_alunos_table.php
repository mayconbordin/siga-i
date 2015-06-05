<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosAlunosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cursos_alunos', function(Blueprint $table)
		{
			$table->integer('curso_id')->unsigned();
			$table->integer('aluno_id')->unsigned();

			$table->primary(['curso_id', 'aluno_id']);
			
			$table->foreign('curso_id')->references('id')
                  ->on('cursos');
            
            $table->foreign('aluno_id')->references('id')
                  ->on('alunos');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cursos_alunos');
	}

}
