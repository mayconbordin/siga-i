<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTurmasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alunos_turmas', function(Blueprint $table)
		{
			$table->integer('aluno_id')->unsigned();
			$table->integer('turma_id')->unsigned();
			
			$table->string('status', 24555);
			
			$table->primary(['aluno_id', 'turma_id']);
			
			$table->foreign('aluno_id')->references('id')
                  ->on('alunos');
            
            $table->foreign('turma_id')->references('id')
                  ->on('turmas');

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
		Schema::drop('alunos_turmas');
	}

}
