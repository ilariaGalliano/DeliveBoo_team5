<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name', 60);
            $table->string('vat', 13)->unique();
            $table->string('address', 80);
            $table->text('body');
            $table->string('phone', 20);
            $table->float('delivery_price', 3, 2);
            $table->float('min_order', 3, 2)->nullable();
            $table->text('path_image')->nullable();
            $table->string('open_hours', 255);
            $table->timestamps();

            // Relations 
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('restaurants');
    }
}
