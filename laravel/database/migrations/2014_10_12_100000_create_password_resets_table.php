<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // ALTER TABLE todolist CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->charset = 'utf8mb4';
            $table->string('email',250)->index();
            $table->string('token',250);
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}
