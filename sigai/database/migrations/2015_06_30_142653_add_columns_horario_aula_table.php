<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsHorarioAulaTable extends Migration
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
            $table->time('horario_inicio');
            $table->time('horario_fim');
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
            $table->dropColumn('horario_inicio');
            $table->dropColumn('horario_fim');
        });
    }
}
