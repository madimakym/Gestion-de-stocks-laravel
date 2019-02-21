<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle')->nullable();
            $table->text('description')->nullable(); 
            $table->integer('prix')->nullable(); 
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories_entrees')
                ->onDelete('restrict')
                ->onUpdate('restrict');
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
        Schema::dropIfExists('entrees');
    }
}
