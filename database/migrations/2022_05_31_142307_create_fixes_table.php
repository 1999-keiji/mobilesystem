<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixes', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->integer('account');
            $table->integer('user_id')->nullable();
            $table->integer('create-user');
            $table->integer('customer_id');
            $table->integer('trigger');
            $table->integer('device_id')->nullable();
            $table->string('color')->nullable();
            $table->integer('serial-number')->nullable();
            $table->date('fix-date');
            $table->string('reception');
            $table->string('fix-details');
            $table->string('stock');
            $table->integer('reception-user');
            $table->integer('fix-user');
            $table->integer('sale_id');
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
        Schema::dropIfExists('fixes');
    }
}
