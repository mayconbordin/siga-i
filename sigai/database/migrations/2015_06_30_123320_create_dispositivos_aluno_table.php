<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispositivosAlunoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispositivos_aluno', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('codigo', 255);

            $table->integer('tipo_dispositivo_id')->unsigned();
            $table->integer('aluno_id')->unsigned();

            $table->foreign('tipo_dispositivo_id')->references('id')
                ->on('tipos_dispositivos_aluno');

            $table->foreign('aluno_id')->references('id')
                ->on('alunos');

            $table->unique(['id', 'codigo']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dispositivos_aluno');
    }
}
