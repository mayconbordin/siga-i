<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('professores', function(Blueprint $table)
		{
			$table->integer('id')->unsigned();
			$table->primary('id');
			
			$table->foreign('id')->references('id')
                  ->on('usuarios');

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
		Schema::drop('professores');
	}

}
