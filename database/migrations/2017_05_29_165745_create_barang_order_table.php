<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_order', function (Blueprint $table) {
            //create barang_order
            $table->increments('id');
            $table->integer('barang_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->integer('quantity');
            $table->timestamps();
            //create PK
            //$table->primary(['barang_id','order_id']);
            //set FK barang_order --barang
            $table->foreign('barang_id')->references('id')->on('barang')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            //set FK barang_order --order
            $table->foreign('order_id')->references('id')->on('order')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_order');
    }
}
