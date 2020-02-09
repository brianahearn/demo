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
          $table->bigIncrements('id');
          $table->timestamps();
          $table->string('name', 191);
          $table->text('ingredients')->nullable();
          $table->text('description')->nullable();
          $table->integer('plu')->nullable();
          $table->string('upc', 191)->nullable();
          $table->string('availability', 191)->nullable();
          $table->string('shelf_life', 191)->nullable();
          $table->integer('temperature_requirements')->default(1);
          $table->text('product_seasonality')->nullable();
          $table->text('note')->nullable();
          $table->decimal('price', 10, 2)->default(0.00);
          $table->integer('created_by')->nullable()->default(1);
          $table->integer('last_edited_by')->nullable()->default(1);
          $table->bigInteger('store_id')->unsigned()->nullable();
          $table->bigInteger('category_id')->unsigned()->nullable();
          $table->softDeletes();
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
