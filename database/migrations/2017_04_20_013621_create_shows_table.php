<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('shows', function(Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('channel');
          $table->string('genre');
          $table->string('status');
          $table->string('notes');
          $table->string('picture');
          $table->string('rating');
          $table->boolean('favorite');
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
        Schema::dropIfExists('shows');
    }
}
