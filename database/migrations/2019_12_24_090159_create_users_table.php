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

     public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('username',255);
            $table->string('mail',255);
            $table->string('password',255);
            $table->string('bio',400)->nullable();
            $table->string('images',255)->default('icon1.png');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('current_timestamp on update current_timestamp'));
        });
    }
     /*---命名規則的にこっちの方が正しい？？【2024/06/06】
    public function up()
    {
        Schema::create('users_table', function (Blueprint $table) {
            $table->integer('user_id')->autoIncrement();
            $table->string('user_name',255);
            $table->string('user_mail',255);
            $table->string('user_password',255);
            $table->string('user_bio',400)->nullable();
            $table->string('user_images',255)->default('icon1.png');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('current_timestamp on update current_timestamp'));
        });
    } */

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
