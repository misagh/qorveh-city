<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table)
        {
            $table->id();
            $table->timestamps();
        });

        Schema::create('post_tag', function (Blueprint $table)
        {
            $table->id();
            $table->foreignId('tag_id');
            $table->foreignId('post_id');

            $table->foreign('tag_id')->on('tags')->references('id');
            $table->foreign('post_id')->on('posts')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('post_tag');
    }
}
