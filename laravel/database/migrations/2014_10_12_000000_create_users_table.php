<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // ALTER TABLE todolist CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->charset = 'utf8mb4';
            $table->increments('id');
            $table->string('name',250);
            $table->string('email',250)->unique();
            $table->string('password',250);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
