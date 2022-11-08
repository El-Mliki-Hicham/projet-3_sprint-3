<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('briefs_student', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("briefs_id");
            $table->unsignedInteger("student_id");
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('briefs_id')->references('id')->on('briefs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('briefs_students');
    }
};
