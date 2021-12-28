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
            $table->increments("id");
            $table->string("productname", 255);
            $table->integer("price");
            $table->text("description");
            $table->string('new_price', 255)->nullable()->change();
            $table->string('new_price', 255);
            $table->string('imagePath', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('admin', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name", 255);
            $table->string("password");
            $table->timestamps();
        });

        Schema::create('cart-product', function (Blueprint $table) {
            $table->increments('id');
            $table->text("productname");
            $table->string("username");
            $table->string("address");
            $table->string("phone");
            $table->integer("price");
            $table->integer("countprod");
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
        Schema::dropIfExists('admin');
        Schema::dropIfExists('cart-product');
    }
}
