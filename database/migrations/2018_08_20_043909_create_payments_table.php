<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('po_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->decimal('vat_inc', 10, 2)->nullable();
            $table->decimal('vat_ex', 10, 2)->nullable();
            $table->string('less_discount')->nullable();
            $table->decimal('vat', 10, 2)->nullable();
            $table->decimal('total_price', 10, 2)->nullable();
            $table->string('remarks')->nullable();
            $table->string('payment_terms')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
