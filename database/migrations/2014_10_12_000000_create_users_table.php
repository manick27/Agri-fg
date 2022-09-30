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
            $table->bigInteger('parent_id')->nullable();
            $table->string('user_uid')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('avatar')->default("user.png");
            $table->string('cni')->default("cni.jpeg");
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->double('available', 255)->default(0);
            $table->integer('is_admin')->default(0);
            $table->integer('is_super_admin')->default(0);
            $table->integer('count_notifications')->default(0);
            $table->enum('status', ['pending', 'accepted', 'refused'])->nullable();
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
