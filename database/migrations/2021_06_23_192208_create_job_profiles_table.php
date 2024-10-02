<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_profiles', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->unsigned();
            $table->string("first_name", 100);
            $table->string("last_name", 100);
            $table->string("current_city", 100);
            $table->string("mobile", 100);
            $table->string("email", 100);
            $table->string("experience", 10);
            $table->string("key_skills", 100)->nullable();
            $table->string("job_title", 100)->nullable();
            $table->string("company", 50)->nullable();
            $table->string("from_year", 50)->nullable();
            $table->string("from_month", 50)->nullable();
            $table->string("to_year", 50)->nullable();
            $table->string("to_month", 50)->nullable();
            $table->string("salary", 50)->nullable();
            $table->string("salary_type", 50)->nullable();
            $table->string("role_description", 50)->nullable();
            $table->string("college_name", 50);
            $table->string("university_name", 50);
            $table->string("degree", 50);
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
        Schema::dropIfExists('job_profiles');
    }
}
