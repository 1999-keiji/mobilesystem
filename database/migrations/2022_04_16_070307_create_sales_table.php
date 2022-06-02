<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->bigInteger('user_id');
            $table->bigInteger('register');
            $table->bigInteger('editer');
            $table->date('sales-date');
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('stock_id')->nullable();
            $table->bigInteger('fix_id')->nullable();
            $table->bigInteger('contract_id')->nullable();
            $table->bigInteger('category_id');
            $table->integer('price');
            $table->integer('commission')->nullable();
            $table->integer('pay_id')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
