<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusDiariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('status_diarios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('status');
			$table->integer('mes');
			
			$table->integer('turma_id')->unsigned();
			$table->integer('professor_id')->unsigned();
			
			$table->foreign('turma_id')->references('id')
                  ->on('turmas');
                  
            $table->foreign('professor_id')->references('id')
                  ->on('professores');

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
		Schema::drop('status_diarios');
	}

}
