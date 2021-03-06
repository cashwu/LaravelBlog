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
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("category_id");
            $table->string("subject", 100);
            $table->string("summary", 1024);
            $table->string("content", 2000);
            $table->boolean("is_publish");
            $table->dateTime("publish_date");
            $table->integer("view_count")->default(0);
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
