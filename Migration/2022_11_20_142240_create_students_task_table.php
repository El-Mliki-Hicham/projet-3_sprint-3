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
        Schema::create('students_task', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("student_id");
            $table->unsignedInteger("tasks_id");
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('tasks_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->timestamp("date_debut");
            $table->timestamp("date_fin");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_task');
    }
};
