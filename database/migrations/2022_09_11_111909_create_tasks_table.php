<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('task')->nullable();
            $table->string('description')->nullable();
            $table->date('startdate')->nullable();
            $table->date('duedate')->nullable();
            $table->string('recurring')->nullable(); // 0 false 1 true
            $table->string('status')->nullable(); // 0 pending  1 completed
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
        Schema::dropIfExists('tasks');
    }
}
