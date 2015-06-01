<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCursoOrigemAlunosTurmasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('alunos_turmas', function($table)
        {
            $table->integer('curso_origem_id')->unsigned();
            
            $table->foreign('curso_origem_id')->references('id')
                  ->on('cursos');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('alunos_turmas', function($table)
        {
            $table->dropForeign('alunos_turmas_curso_origem_id_foreign');
            $table->dropColumn('curso_origem_id');
        });
	}

}
