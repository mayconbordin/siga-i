<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDispositivosUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('dispositivos_aluno', 'dispositivos');
        Schema::table('dispositivos', function ($table) {
            $table->dropForeign('dispositivos_aluno_aluno_id_foreign');
            $table->dropColumn('aluno_id');

            $table->integer('usuario_id')->unsigned()->nullable();

            $table->foreign('usuario_id')->references('id')
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
        Schema::rename('dispositivos', 'dispositivos_aluno');
        Schema::table('dispositivos_aluno', function ($table) {
            $table->dropForeign('dispositivos_usuario_id_foreign');
            $table->dropColumn('usuario_id');

            $table->integer('aluno_id')->unsigned()->nullable();

            $table->foreign('aluno_id')->references('id')
                ->on('alunos');
        });
    }
}
