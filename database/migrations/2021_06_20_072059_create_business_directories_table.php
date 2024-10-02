<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessDirectoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_directories', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->unsigned();
            $table->string("company_name",100);
            $table->string("visiting_card",100);
            $table->string("category",100);
            $table->string("work",100)->nullable();
            $table->string("person_name",100)->nullable();
            $table->string("mobile",10);
            $table->string("email",100)->nullable();
            $table->longText("address")->nullable();
            $table->string("pincode",10)->nullable();
            $table->string("city",50);
            $table->string("state",50);
            $table->string("country",50)->nullable();
            $table->string("website_link",50);
            $table->string("any_offer",50)->nullable();
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
        Schema::dropIfExists('business_directories');
    }
}
