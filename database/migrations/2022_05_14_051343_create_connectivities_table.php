<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connectivities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('theme_id');
            $table->string('address_title');
            $table->longText('description');
            $table->string('address');
            $table->string('phone');
            $table->string('fax');
            $table->string('email');
            $table->string('total_download');
            $table->string('download_text');
            $table->string('total_client');
            $table->string('client_text');
            $table->longText('subscribe_description');
            $table->string('facebook_link');
            $table->string('subscribe_link');
            $table->foreign('theme_id')->references('id')->on('themes');
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
        Schema::dropIfExists('connectivities');
    }
}
