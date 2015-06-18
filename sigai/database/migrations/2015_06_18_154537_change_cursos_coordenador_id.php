<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCursosCoordenadorId extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('cursos', function($table)
        {
            $table->integer('coordenador_id')->unsigned()->nullable()->change();
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
            $table->integer('coordenador_id')->unsigned()->change();
        });
	}

}
