<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('friends', function (Blueprint $table) {
      $table->increments('id');
      $table->string('user_id');
      $table->string('friend_id');
      $table->string('mark_name');
      $table->string('special_care');
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
    Schema::drop('friends');
  }
}
