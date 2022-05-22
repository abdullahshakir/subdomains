<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('theme_id');
            $table->string('address_title');
            $table->longText('description');
            $table->string('address');
            $table->string('phone');
            $table->string('fax');
            $table->string('email');
            $table->string('total_download')->nullable();
            $table->string('download_text')->nullable();
            $table->string('total_client')->nullable();
            $table->string('client_text')->nullable();
            $table->longText('subscribe_description');
            $table->string('facebook_link');
            $table->string('subscriber_link');
            $table->string('privacy_link');
            $table->string('term_link');
            $table->string('pinterest_link');
            $table->string('yahoo_link');
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
        Schema::dropIfExists('footers');
    }
}
