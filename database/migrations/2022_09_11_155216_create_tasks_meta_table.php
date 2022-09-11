<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks_meta', function (Blueprint $table) {
            $table->id();
            $table->string('task_id')->nullable();
            $table->date('repeat_start')->nullable();
            $table->string('repeat_interval')->nullable();
            $table->string('repeat_year')->nullable();
            $table->string('repeat_month')->nullable();
            $table->string('repeat_day')->nullable();
            $table->string('repeat_week')->nullable();
            $table->string('repeat_weekday')->nullable();
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
        Schema::dropIfExists('tasks_meta');
    }
}
