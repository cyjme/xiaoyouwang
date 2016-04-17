<?php

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
      $table->increments('id');
      $table->string('name');
      $table->string('school_name');
      $table->string('faculty');
      $table->string('major');
      $table->string('grade');
      $table->string('school_year');
      $table->string('phone_number');
      $table->string('email')->unique();
      $table->string('password', 60);
      $table->rememberToken();
      $table->string('avator_url');
      $table->string('interest');
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
    Schema::drop('users');
  }
}
