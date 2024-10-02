<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactSignUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_sign_ups', function (Blueprint $table) {
            $table->id();
            $table->string('id_no', 10);
            $table->string('hod_name', 255);
            $table->string('hod_srname', 100);
            $table->string('image', 100);
            $table->string('hod_gender', 100);
            $table->string('father_name', 100);
            $table->longText('address');
            $table->string('pincode', 50);
            $table->string('city', 50);
            $table->string('state', 50);
            $table->string('hod_email', 50)->nullable();
            $table->string('dob', 50);
            $table->string('birth_place', 50)->nullable();
            $table->string('marital_status', 50)->nullable();
            $table->string('marriage_anniversary_date', 50)->nullable();
            $table->string('hod_mobile_no', 12);
            $table->string('landline_no', 50)->nullable();
            $table->string('education', 100)->nullable();
            $table->string('occupation', 100)->nullable();
            $table->string('department_name', 100)->nullable();
            $table->string('designation', 100)->nullable();
            $table->string('what_do_you_want', 100)->nullable();
            $table->string('business_description', 100)->nullable();
            $table->string('unemployed_education', 100)->nullable();
            $table->string('experiance', 100)->nullable();
            $table->string('expected_salary', 100)->nullable();
            $table->string('class_name', 100)->nullable();
            $table->string('university_name', 100)->nullable();
            $table->string('education_city', 100)->nullable();
            $table->string('organization_name', 100)->nullable();
            $table->string('social_designation', 100)->nullable();
            $table->string('kind_of_social_work', 100)->nullable();
            $table->string('extra_activity', 100)->nullable();
            $table->string('bussiness_name', 100)->nullable();
            $table->string('bussiness_description', 100)->nullable();
            $table->string('professional_name', 100)->nullable();
            $table->string('professional_designation', 100)->nullable();
            $table->string('rtr_department_name', 100)->nullable();
            $table->string('rtr_designation', 100)->nullable();
            $table->string('rtr_job_description', 100)->nullable();
            $table->string('rtr_work_description', 100)->nullable();
            $table->string('blood_group', 10)->nullable();
            $table->string('fapp_number', 10);
            $table->string('fmname1', 100)->nullable();
            $table->string('relationshipHOD1', 10)->nullable();
            $table->string('fmname2', 100)->nullable();
            $table->string('relationshipHOD2', 10)->nullable();
            $table->string('fmname3', 100)->nullable();
            $table->string('relationshipHOD3', 10)->nullable();
            $table->string('fmname4', 100)->nullable();
            $table->string('relationshipHOD4', 10)->nullable();
            $table->string('fmname5', 100)->nullable();
            $table->string('relationshipHOD5', 10)->nullable();
            $table->string('fmname6', 100)->nullable();
            $table->string('relationshipHOD6', 10)->nullable();
            $table->string('fmname7', 100)->nullable();
            $table->string('relationshipHOD7', 10)->nullable();
            $table->string('fmname8', 100)->nullable();
            $table->string('relationshipHOD8', 10)->nullable();
            $table->string('fmname9', 100)->nullable();
            $table->string('relationshipHOD9', 10)->nullable();
            $table->string('fmname10', 100)->nullable();
            $table->string('relationshipHOD10', 10)->nullable();
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
        Schema::dropIfExists('contact_sign_ups');
    }
}
