<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ref_category')->unsigned()->nullable();
            $table->string('name');
            $table->string('date')->nullable();
            $table->string('autor')->nullable();
            $table->string('photo')->nullable();
            $table->string('image_caption')->nullable();
            $table->string('description');
            $table->timestamps();
            $table->foreign('ref_category')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
