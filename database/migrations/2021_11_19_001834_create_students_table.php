<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_training');
            $table->string('firstName', 255);
            $table->string('lastName', 255);
            $table->date('birthday');
            $table->enum('sex',['M','F']);
            $table->string('educationLevel', 255);
            $table->string('branchOfStudy', 255);
            $table->string('email', 255);
            $table->string('address', 255);
            $table->string('tel', 255);
            $table->string('parentContact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
