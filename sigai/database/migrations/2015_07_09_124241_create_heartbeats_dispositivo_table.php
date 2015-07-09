<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeartbeatsDispositivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heartbeats_dispositivo', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('oauth_client_id', 40);

            $table->foreign('oauth_client_id')->references('id')
                ->on('oauth_clients');

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
        Schema::drop('heartbeats_dispositivo');
    }
}
