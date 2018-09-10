<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // ALTER TABLE todolist CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci
    public function up()
    {
        Schema::create('user_tasks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->charset = 'utf8mb4';
            $table->increments('id');
            $table->integer('userId')->unsigned();
            $table->integer('taskId')->unsigned();
            $table->timestamps();

            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('taskId')->references('id')->on('tasks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_tasks');
    }
}
