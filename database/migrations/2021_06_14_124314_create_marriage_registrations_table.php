<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarriageRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marriage_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('create_profile_for',50);
            $table->string('gender',50);
            $table->string('user_name',50);
            $table->string('caste',50);
            $table->string('dob',50);
            $table->string('age',10);
            $table->string('birth_time',50);
            $table->string('birth_place',50);
            $table->string('marital_status',50);
            $table->string('height',50);
            $table->string('complexion',50);
            $table->string('manglik',50);
            $table->string('gotra',50);
            $table->string('profile_image',50);
            $table->string('education',50);
            $table->string('occupation',50);
            $table->string('annual_income',50);
            $table->string('pincode',50);
            $table->string('city',50);
            $table->string('state',50);
            $table->string('country',50);
            $table->longText('contact_address');
            $table->string('mobile',50);
            $table->string('email',50);
            $table->string('other_phone_no',50)->nullable();
            $table->string('phone_no_relation',50)->nullable();
            $table->string('father_name',50);
            $table->string('father_occupation',50);
            $table->string('mother_name',50);
            $table->string('mother_occupation',50);
            $table->string('brothers',50);
            $table->string('married_brothers',50)->nullable();
            $table->string('un_married_brothers',50)->nullable();
            $table->string('sisters',50);
            $table->string('married_sisters',50)->nullable();
            $table->string('un_married_sisters',50)->nullable();
            $table->integer('status')->unsigned();
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
        Schema::dropIfExists('marriage_registrations');
    }
}
