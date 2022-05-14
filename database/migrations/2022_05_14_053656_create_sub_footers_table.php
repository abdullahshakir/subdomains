<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_footers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('theme_id');
            $table->string('right_title');
            $table->longText('term_text');
            $table->string('term_link');
            $table->longText('privacy_text');
            $table->string('privacy_link');
            $table->string('fb_link');
            $table->string('twitter_link');
            $table->string('google_link');
            $table->string('printest_link');
            $table->string('vemo_link');
            $table->string('cat_link');
            $table->string('yahoo_link');
            $table->string('linkedin_link');
            $table->string('email');
            $table->string('phone');
            $table->string('skype_name');
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
        Schema::dropIfExists('sub_footers');
    }
}
