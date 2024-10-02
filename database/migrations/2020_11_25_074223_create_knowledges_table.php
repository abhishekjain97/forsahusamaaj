<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnowledgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knowledges', function (Blueprint $table) {
            $table->id();
            $table->integer('home_menu_id')->unsigned();
            $table->integer('sub_menu_id')->unsigned();
            $table->integer('sub_sub_menu_id')->unsigned();
            $table->string('title',255);
            $table->string('slug',255);
            $table->string('country', 100);
            $table->string('state', 100);
            $table->string('business_cate', 100);
            $table->tinyInteger('is_featured')->unsigned();
            $table->string('publish_date', 100);
            $table->text('short_desc');
            $table->longText('long_desc');
            $table->string('thubmnail',100);
            $table->string('tags',200);
            $table->string('meta_title',100);
            $table->string('meta_keyword',200);
            $table->longText('meta_desc');
            $table->integer('views_count')->unsigned()->nullable();
            $table->string('author',100);
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
        Schema::dropIfExists('knowledges');
    }
}
