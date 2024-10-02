<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberDirectoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_directories', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->unsigned();
            $table->string("name",100);
            $table->string("mobile",50);
            $table->string("occupation",100);
            $table->longText("city");
            $table->longText("work_state");
            $table->string("blood_group",20);
            $table->string("dob_day",10);
            $table->string("dob_month",10);
            $table->string("dob_year",10);
            $table->longText("description");
            $table->string("doa_day",10)->nullable();
            $table->string("doa_month",10)->nullable();
            $table->string("doa_year",10)->nullable();
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
        Schema::dropIfExists('member_directories');
    }
}
