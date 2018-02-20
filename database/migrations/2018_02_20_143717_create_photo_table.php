<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Photo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("article_id");
            $table->string("file_name", 128);
            $table->string("description", 128);
            $table->timestamps();

            $table->index("article_id", "article_id_idx");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Photo');
    }
}
