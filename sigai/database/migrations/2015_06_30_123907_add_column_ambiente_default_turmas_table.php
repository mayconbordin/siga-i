<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnAmbienteDefaultTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('turmas', function($table)
        {
            $table->integer('ambiente_default_id')->unsigned();

            $table->foreign('ambiente_default_id')->references('id')
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
        Schema::table('turmas', function($table)
        {
            $table->dropForeign('turmas_ambiente_default_id_foreign');
            $table->dropColumn('ambiente_default_id');
        });
    }
}
