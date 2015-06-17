<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeProfessoresCursoOrigemId extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('professores', function($table)
        {
            $table->integer('curso_origem_id')->unsigned()->nullable()->change();
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
            $table->integer('curso_origem_id')->unsigned()->change();
        });
	}

}
