<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChamadasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chamadas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('aluno_id')->unsigned();
			$table->integer('aula_id')->unsigned();
			$table->boolean('p1');
			$table->boolean('p2');
			$table->boolean('p3');
			$table->boolean('p4');

			$table->foreign('aluno_id')->references('id')
                  ->on('alunos');
                  
            $table->foreign('aula_id')->references('id')
                  ->on('aulas');

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
		Schema::drop('chamadas');
	}

}
