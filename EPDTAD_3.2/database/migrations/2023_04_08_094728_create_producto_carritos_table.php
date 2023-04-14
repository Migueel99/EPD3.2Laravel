<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_carritos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_producto');
            $table->foreign('id_producto')
            ->references('id')
            ->on('productos')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('id_carrito');
            $table->foreign('id_carrito')
            ->references('id')
            ->on('carritos')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('cantidad');
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
        Schema::dropIfExists('producto_carritos');
    }
};
