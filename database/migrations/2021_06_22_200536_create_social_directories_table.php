<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialDirectoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_directories', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->unsigned();
            $table->string("name", 100);
            $table->string("image", 100);
            $table->string("designation", 100);
            $table->string("city", 100);
            $table->string("organization_name", 100);
            $table->string("facebook", 100);
            $table->string("twitter", 100)->nullable();
            $table->longText("linkedin")->nullable();
            $table->string("instagram", 100)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_directories');
    }
}
