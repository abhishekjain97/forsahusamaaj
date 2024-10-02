<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarathonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marathons', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('fatherName',100);
            $table->longText('address');
            $table->string('mobile',100);
            $table->string('dob',100);
            $table->string('aadhar_no',100);
            $table->string('signature',100);
            $table->string('image',100);
            $table->string('gender',100);
            $table->string('state',100);
            $table->string('district',100);
            $table->string('chest_no', 50);
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
        Schema::dropIfExists('marathons');
    }
}
