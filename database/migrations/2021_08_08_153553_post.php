<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Post extends Migration
{
    /**
     * Run the migrations.
     *
    * @return void
     */
    public function up()
    {
        Schema::create('posts', function(Blueprint $table){
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('image');
            $table->string('description');
            $table->longText('longtext'); 
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreignId('userId');
            $table->timestamps();

            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
