<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('student_id')->nullable();
            // $table->foreign('student_id')->references('id')->on('students')
            // ->constrained()
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            $table->float('task1')->nullable();
            $table->float('task2')->nullable();
            $table->float('task3')->nullable();
            $table->float('ball')->nullable();
            $table->string('img')->nullable();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
