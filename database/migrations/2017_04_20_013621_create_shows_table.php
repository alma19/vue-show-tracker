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
      //creates show table
      Schema::create('shows', function(Blueprint $table) {
          $table->increments('id');
          $table->string('name')->default('')->nullable();
          $table->string('channel')->default('')->nullable();
          $table->string('genre')->default('')->nullable();
          $table->string('status')->default('')->nullable();
          $table->string('season')->default('')->nullable();;
          $table->string('episode')->default('')->nullable();;
          $table->string('picture')->default('')->nullable();
          $table->integer('rating')->default(0);
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
        //removes show table 
        Schema::dropIfExists('shows');
    }
}
