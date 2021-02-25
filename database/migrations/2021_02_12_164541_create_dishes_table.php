<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('dishtype_id');
            $table->string('name', 60);
            $table->text('description');
            $table->text('allergens')->nullable();
            $table->float('price', 4, 2);
            $table->boolean('visibility');
            $table->boolean('vegan')->nullable();
            $table->text('path_image')->nullable();
            $table->timestamps();

            // Relations 
            $table->foreign('restaurant_id')
                ->references('id')
                ->on('restaurants')
                ->onDelete('cascade');
        
            $table->foreign('dishtype_id')
                ->references('id')
                ->on('dishtypes')
                ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dishes');
    }
}
