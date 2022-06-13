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
        Schema::create('arrears', function (Blueprint $table){
            $table->id();
            $table->string('semester');
            $table->boolean('closed');
            $table->unsignedBigInteger('id_lesson');
            $table->unsignedBigInteger('id_student');
            $table->unsignedBigInteger('id_teacher');
            $table->foreign('id_teacher')->references('id')->on('teachers')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_student')->references('id')->on('students')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_lesson')->references('id')->on('lessons')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
