<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_jobs', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->unsigned();
            $table->string("company_name", 100);
            $table->string("title", 100);
            $table->string("description", 100);
            $table->string("job_type", 100);
            $table->string("experience_from", 100);
            $table->string("experience_to", 10);
            $table->string("min_salary", 100)->nullable();
            $table->string("max_salary", 100)->nullable();;
            $table->string("salary_period", 50);
            $table->string("key_skills", 50);
            $table->string("no_of_position", 50);
            $table->string("location", 50);
            $table->string("address", 50);
            $table->string("country", 50);
            $table->string("mobile", 50);
            $table->string("email", 50);
            $table->string("website_url", 50)->nullable();
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
        Schema::dropIfExists('post_jobs');
    }
}
