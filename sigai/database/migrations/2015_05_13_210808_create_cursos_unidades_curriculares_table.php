<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosUnidadesCurricularesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cursos_unidades_curriculares', function(Blueprint $table)
		{
			$table->integer('curso_id')->unsigned();
			$table->integer('uni_curr_id')->unsigned();

			$table->primary(['curso_id', 'uni_curr_id']);
			
			$table->foreign('curso_id')->references('id')
                  ->on('cursos');
            
            $table->foreign('uni_curr_id')->references('id')
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
		Schema::drop('cursos_unidades_curriculares');
	}

}
