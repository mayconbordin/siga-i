<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnProfessorAulasTable extends Migration
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
            $table->integer('professor_id')->unsigned()->nullable();

            $table->foreign('professor_id')->references('id')
                ->on('professores');
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
            $table->dropForeign('aulas_professor_id_foreign');
            $table->dropColumn('professor_id');
        });
    }
}
