<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTipoDispositivoFieldToOauthClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oauth_clients', function($table)
        {
            $table->integer('tipo_dispositivo_id')->unsigned()->nullable();

            $table->foreign('tipo_dispositivo_id')->references('id')
                ->on('tipos_dispositivos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oauth_clients', function($table)
        {
            $table->dropForeign('oauth_clients_tipo_dispositivo_id_foreign');
            $table->dropColumn('tipo_dispositivo_id');
        });
    }
}
