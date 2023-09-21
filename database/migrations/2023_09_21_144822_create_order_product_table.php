<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id'); // Clave externa para la relación con orders
            $table->unsignedBigInteger('product_id'); // Clave externa para la relación con products
            $table->integer('availability');
            $table->decimal('price', 8, 2);
            $table->timestamps();

            // Definir las relaciones con las tablas 'orders' y 'products'
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_product');
    }
};
