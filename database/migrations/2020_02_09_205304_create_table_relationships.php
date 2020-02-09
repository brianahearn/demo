<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Foreign Keys
        Schema::table('products', function (Blueprint $table) {
          $table->foreign('category_id')->references('id')->on('categories');
          $table->foreign('store_id')->references('id')->on('stores');
        });

        Schema::table('pantries', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('recipe_steps', function (Blueprint $table) {
          $table->foreign('recipe_id')->references('id')->on('recipes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_relationships');
    }
}
