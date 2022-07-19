<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('sku');
            $table->integer('brand_id');
            $table->integer('price');
            $table->integer('old_price');
            $table->text('description');
            $table->text('characteristics');
            $table->text('accessories');
            $table->text('spare_parts');
            $table->string('analog_products');
            $table->integer('category_id');
            $table->integer('in_stock');
            $table->boolean('leasing');
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
        Schema::dropIfExists('products');
    }
}
