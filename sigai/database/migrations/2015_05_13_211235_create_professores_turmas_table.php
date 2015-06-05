<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessoresTurmasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('professores_turmas', function(Blueprint $table)
		{
			$table->integer('professor_id')->unsigned();
			$table->integer('turma_id')->unsigned();

			$table->primary(['professor_id', 'turma_id']);
			
			$table->foreign('professor_id')->references('id')
                  ->on('professores');
            
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
		Schema::drop('professores_turmas');
	}

}
