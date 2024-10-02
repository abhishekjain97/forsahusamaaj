<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachingClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coaching_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('father_name', 100);
            $table->string('mother_name', 100);
            $table->string('gender', 10);
            $table->longText('contact_address');
            $table->longText('permanant_address');
            $table->string('dob', 50);
            $table->string('mobile', 11);
            $table->string('high_school_year', 100)->nullable();
            $table->string('high_school_organisation', 100)->nullable();
            $table->string('high_school_position', 100)->nullable();
            $table->string('high_school_marks', 100)->nullable();
            $table->string('high_school_obtain_marks', 100)->nullable();
            $table->string('high_school_percentage', 100)->nullable();
            $table->string('intermediate_year', 100)->nullable();
            $table->string('intermediate_organisation', 100)->nullable();
            $table->string('intermediate_position', 100)->nullable();
            $table->string('intermediate_marks', 100)->nullable();
            $table->string('intermediate_obtain_marks', 100)->nullable();
            $table->string('intermediate_percentage', 100)->nullable();
            $table->string('graduation_year', 100)->nullable();
            $table->string('graduation_organisation', 100)->nullable();
            $table->string('graduation_position', 100)->nullable();
            $table->string('graduation_marks', 100)->nullable();
            $table->string('graduation_obtain_marks', 100)->nullable();
            $table->string('graduation_percentage', 100)->nullable();
            $table->string('post_graduation_year', 100)->nullable();
            $table->string('post_graduation_organisation', 100)->nullable();
            $table->string('post_graduation_position', 100)->nullable();
            $table->string('post_graduation_marks', 100)->nullable();
            $table->string('post_graduation_obtain_marks', 100)->nullable();
            $table->string('post_graduation_percentage', 100)->nullable();
            $table->string('diploma_year', 100)->nullable();
            $table->string('diploma_organisation', 100)->nullable();
            $table->string('diploma_position', 100)->nullable();
            $table->string('diploma_marks', 100)->nullable();
            $table->string('diploma_obtain_marks', 100)->nullable();
            $table->string('diploma_percentage', 100)->nullable();
            $table->string('signature', 100);
            $table->string('image', 100);
            $table->string('occupation', 100);
            $table->string('annual_income', 100);
            $table->string('cast', 100);
            $table->string('sub_cast', 100);

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
        Schema::dropIfExists('coaching_classes');
    }
}
