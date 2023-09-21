<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersAndOrderProductTables extends Migration
{
    public function up()
    {
        // Agregar nuevas columnas a la tabla 'orders'
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('idUser');
            $table->date('dateOrder');
            $table->decimal('totalOrder', 8, 2);

            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
        });

        // Crear la tabla 'order_product'
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idOrder');
            $table->unsignedBigInteger('product_id');
            $table->integer('availability');
            $table->decimal('price', 8, 2);
            $table->timestamps();

            $table->foreign('idOrder')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        // Eliminar la tabla 'order_product'
        Schema::dropIfExists('order_product');

        // Eliminar las columnas agregadas a la tabla 'orders'
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['dateOrder', 'totalOrder', 'user_id']);
            $table->enum('status', ['pendiente', 'procesando', 'completado', 'cancelado'])->default('pendiente');
            $table->decimal('total', 10, 2)->default(0.00);
        });
    }
}
