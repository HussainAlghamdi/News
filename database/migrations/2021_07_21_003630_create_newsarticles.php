<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsarticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsarticles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->string('author_name');
            $table->longText('content');
            $table->dateTime('date_publish');
            $table->integer('number_visitors')->default(0);
            $table->string('thumbnail');
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('newsarticles');
    }
}
