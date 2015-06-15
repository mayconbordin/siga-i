<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiariosEnviosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diarios_envios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('diario_id')->unsigned();
			$table->integer('professor_id')->unsigned();
            $table->string('filename', 255);
            
			$table->foreign('diario_id')->references('id')
                  ->on('status_diarios');
            
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
		Schema::drop('diarios_envios');
	}

}
