<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispositivosAmbienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispositivos_ambiente', function(Blueprint $table)
        {
            $table->integer('ambiente_id')->unsigned();
            $table->string('oauth_client_id', 40);

            $table->primary(['ambiente_id', 'oauth_client_id']);

            $table->foreign('ambiente_id')->references('id')
                ->on('ambientes');

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
        Schema::drop('dispositivos_ambiente');
    }
}
