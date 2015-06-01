<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadesCurricularesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('unidades_curriculares', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nome', 255);
			$table->integer('carga_horaria');
			$table->string('sigla', 5);

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
		Schema::drop('unidades_curriculares');
	}

}
