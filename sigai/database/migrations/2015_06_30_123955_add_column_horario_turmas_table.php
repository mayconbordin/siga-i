<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnHorarioTurmasTable extends Migration
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
        Schema::table('turmas', function($table)
        {
            $table->dropColumn('horario_inicio');
            $table->dropColumn('horario_fim');
        });
    }
}
