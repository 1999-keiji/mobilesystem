<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('plan_id');
            $table->integer('status');
            $table->bigInteger('customer_id');
            $table->date('contract-date');
            $table->integer('contract-fee')->nullable();
            $table->integer('data-traffic-cost')->nullable();
            $table->integer('bill')->nullable();
            $table->integer('incentive')->nullable();
            $table->integer('confirmation')->nullable();
            $table->date('confirmation-date')->nullable();
            $table->integer('confirmation-user')->nullable();
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
        Schema::dropIfExists('contracts');
    }
}
