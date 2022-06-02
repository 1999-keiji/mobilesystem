<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer('status');
          $table->integer('user_id');
          $table->integer('register');
          $table->integer('editer');
          $table->integer('customer_id')->nullable();
          $table->integer('category_id')->nullable();
          $table->integer('maker_id')->nullable();
          $table->integer('device_id')->nullable();
          $table->string('color')->nullable();
          $table->string('name')->nullable();
          $table->string('serial-number')->nullable();
          $table->string('rank')->nullable();
          $table->integer('supplier_id')->nullable();
          $table->integer('supply-stock');
          $table->integer('inventory_id');
          $table->timestamp('supply-date')->format('Y/m/d');
          $table->integer('supply-price');
          $table->integer('minimum-stock')->nullable();
          $table->longText('remarks')->nullable();
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
        Schema::dropIfExists('stocks');
    }
}
