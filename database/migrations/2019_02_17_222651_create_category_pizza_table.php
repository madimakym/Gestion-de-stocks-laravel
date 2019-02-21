<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryPizzaTable extends Migration
{
   
    public function up()
    {
        Schema::create('category_pizza', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle')->nullable();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('category_pizza');
    }
}
