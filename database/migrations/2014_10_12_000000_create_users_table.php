<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();

            $table->string('cell_phone_number')->unique();

            $table->string('office_phone_number')->nullable();

            $table->string('work_place')->nullable();
            $table->string('job')->nullable();

            $table->string('department_name')->nullable();

            $table->boolean('tasks')->default(0);
            $table->boolean('numbers')->default(0);
            $table->boolean('notifications')->default(0);

            $table->string('sms')->nullable();
            $table->string('moderator_index')->nullable();

            $table->boolean('status')->nullable();

            $table->string('role')->default('user');
            // если false то это обычной пользователь, а если true то это модератор

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
