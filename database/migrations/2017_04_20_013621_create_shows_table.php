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
          $table->string('name')->default('');
          $table->string('channel')->default('');
          $table->string('genre')->default('');
          $table->string('status')->default('');
          $table->string('picture')->default('');
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
        Schema::dropIfExists('shows');
    }
}
