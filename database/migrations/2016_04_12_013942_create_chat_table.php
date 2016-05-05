<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('chat', function (Blueprint $table) {
      $table->increments('id');
      $table->string('user_id');
      $table->string('new');
      $table->string('send_user_id');
      $table->string('have_read');
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
    Schema::drop('chat');
  }
}
