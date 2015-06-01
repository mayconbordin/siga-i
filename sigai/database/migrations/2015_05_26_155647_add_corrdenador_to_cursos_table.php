<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCorrdenadorToCursosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cursos', function($table)
        {
            $table->integer('coordenador_id')->unsigned();
            
            $table->foreign('coordenador_id')->references('id')
                  ->on('usuarios');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cursos', function($table)
        {
            $table->dropForeign('cursos_coordenador_id_foreign');
            $table->dropColumn('coordenador_id');
        });
	}

}
