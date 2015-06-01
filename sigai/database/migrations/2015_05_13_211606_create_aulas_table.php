<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAulasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aulas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('data');
			$table->integer('status')->nullable();
			$table->text('conteudo')->nullable();
			
			$table->integer('turma_id')->unsigned();
			
			$table->foreign('turma_id')->references('id')
                  ->on('turmas');

            $table->index('data');
            
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
		Schema::drop('aulas');
	}

}
