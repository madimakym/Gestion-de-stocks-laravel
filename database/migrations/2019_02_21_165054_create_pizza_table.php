<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePizzaTable extends Migration
{
  
    public function up()
    {
        Schema::create('pizza', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle')->nullable();
            $table->text('description')->nullable(); 
            $table->integer('prix')->nullable(); 
            $table->string('image')->nullable(); 
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('category_pizza')
            ->onDelete('CASCADE');
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('pizza');
    }
}
