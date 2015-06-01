<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToAulasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('aulas', function($table)
        {
            $table->boolean('ensino_a_distancia')->default(false);
            $table->text('obs')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('aulas', function($table)
        {
            $table->dropColumn('ensino_a_distancia');
            $table->dropColumn('obs');
        });
	}

}
