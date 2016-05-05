<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrendsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('trends', function (Blueprint $table) {
      $table->increments('id');
      $table->string('user_id');
      $table->string('content');
      $table->string('imageUrl');
      $table->string('agreeNumber');
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
    Schema::drop('trends');
  }
}
