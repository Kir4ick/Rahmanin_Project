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
        Schema::create('rate', function (Blueprint $table){
            $table->id();
            $table->string('rate', 1); //Строка, т к тут ещё могут быть Нки
            $table->unsignedBigInteger('id_teacher');
            $table->unsignedBigInteger('id_student');
            $table->unsignedBigInteger('id_lesson');
            $table->timestamps();
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
