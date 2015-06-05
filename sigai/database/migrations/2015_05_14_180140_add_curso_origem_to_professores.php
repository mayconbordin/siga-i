<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCursoOrigemToProfessores extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('professores', function($table)
        {
            $table->integer('curso_origem_id')->unsigned();
            
            $table->foreign('curso_origem_id')->references('id')
                  ->on('cursos');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('professores', function($table)
        {
            $table->dropForeign('professores_curso_origem_id_foreign');
            $table->dropColumn('curso_origem_id');
        });
	}

}
