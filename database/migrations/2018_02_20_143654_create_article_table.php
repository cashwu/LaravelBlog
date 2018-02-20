<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Article', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("category_id");
            $table->string("subject", 100);
            $table->string("summary", 1024);
            $table->string("content");
            $table->boolean("IsPublish");
            $table->dateTime("publish_date");
            $table->integer("view_count");
            $table->timestamps();

            $table->index("category_id", "category_id_idx");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Article');
    }
}
