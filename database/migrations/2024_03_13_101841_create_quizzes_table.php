<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->integer('questionType');
            $table->string('answerA')->nullable();
            $table->string('answerB')->nullable();
            $table->string('answerC')->nullable();
            $table->string('answerD')->nullbale();
            $table->string('correctAnswer')->nullable();
            $table->float('score')->nullable();
            $table->integer('ordering')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('quizzes');
    }
}
