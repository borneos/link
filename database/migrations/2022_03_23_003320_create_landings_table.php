<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landings', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id')->unsigned();
            $table->string('image');
            $table->string('title');
            $table->string('description');
            $table->string('social_facebook');
            $table->string('social_twitter');
            $table->string('social_youtube');
            $table->string('social_instagram');
            $table->string('social_linkedin');
            $table->string('links');
            $table->timestamps();
            // $table->foreign('post_id')->references('id')->on('posts');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('landings');
    }
}
