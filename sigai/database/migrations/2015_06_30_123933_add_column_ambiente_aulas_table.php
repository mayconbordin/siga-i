<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnAmbienteAulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aulas', function($table)
        {
            $table->integer('ambiente_id')->unsigned()->nullable();

            $table->foreign('ambiente_id')->references('id')
                ->on('ambientes');
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
            $table->dropForeign('aulas_ambiente_id_foreign');
            $table->dropColumn('ambiente_id');
        });
    }
}
