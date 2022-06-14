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
        Schema::create('days', function (Blueprint $table){
            $table->id();
            $table->string('day');
        });
        Schema::create('calls', function (Blueprint $table){
            $table->id();
            $table->string('begin');
            $table->string('end');
        });
        Schema::create('classes', function (Blueprint $table){
            $table->id();
            $table->string('number');
        });
        Schema::create('parity', function (Blueprint $table){
            $table->id();
            $table->string('even');
        });
        Schema::create('timetable', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('id_day');
            $table->unsignedBigInteger('id_calls');
            $table->unsignedBigInteger('id_class');
            $table->unsignedBigInteger('id_even');
            $table->unsignedBigInteger('id_lesson');
            $table->unsignedBigInteger('id_group');
            $table->unsignedBigInteger('id_teacher');
            $table->foreign('id_day')->references('id')->on('days')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_calls')->references('id')->on('calls')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_class')->references('id')->on('classes')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_even')->references('id')->on('parity')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_lesson')->references('id')->on('lessons')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_group')->references('id')->on('groups')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_teacher')->references('id')->on('teachers')->onDelete('CASCADE')->onUpdate('CASCADE');
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
