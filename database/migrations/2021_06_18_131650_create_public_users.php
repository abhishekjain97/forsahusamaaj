<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_users', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('email',100);
            $table->string('mobile',20);
            $table->string('password',100);
            $table->string('insert_image',50);
            $table->string('otp',10)->nullable();
            $table->tinyInteger('is_verified')->unsigned()->default(0);
            $table->integer('membership_id');
            $table->dateTime('membership_start')->nullable();
            $table->dateTime('membership_end')->nullable();
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
        Schema::dropIfExists('public_users');
    }
}
