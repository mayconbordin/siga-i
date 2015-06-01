<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('turmas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nome', 30);
			$table->date('data_inicio');
			$table->date('data_fim');
			$table->integer('unidade_curricular_id')->unsigned();
			
			$table->foreign('unidade_curricular_id')->references('id')
                  ->on('unidades_curriculares');

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
		Schema::drop('turmas');
	}

}
