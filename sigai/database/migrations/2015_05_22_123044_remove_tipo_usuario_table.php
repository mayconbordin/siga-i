<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveTipoUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::table('usuarios', function($table)
        {
            $table->dropForeign('usuarios_tipo_usuario_id_foreign');
            $table->dropColumn('tipo_usuario_id');
        });
        
		Schema::drop('tipos_usuarios');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('tipos_usuarios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nome', 45);
		});
		
		Schema::table('usuarios', function($table)
        {
            $table->integer('tipo_usuario_id')->unsigned();
            
            $table->foreign('tipo_usuario_id')->references('id')
                  ->on('tipos_usuarios');
        });
	}

}
