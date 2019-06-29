<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Relación entre proveedor y producto
        Schema::table('products', function ($table) {
            $table->foreign('provider_id')->references('id')->on('providers')->onUpdate('cascade');
        });

        //Relación de tabla detalle producto - venta
        Schema::table('product_sale', function ($table) {
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade');
            $table->foreign('sale_id')->references('id')->on('sales')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
