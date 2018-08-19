<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('po_number')->nullable();
            $table->integer('number')->nullable();
            $table->string('groupid')->nullable();
            $table->integer('groupnum')->nullable();
            $table->datetime('request_date')->nullable();
            $table->integer('vendor_id');
            $table->integer('requestor_id');
            $table->string('item');
            $table->integer('quantity');
            $table->string('uom')->nullable();
            $table->string('description')->nullable();
            $table->decimal('item_unitprice', 8, 2);
            $table->decimal('item_totalprice', 10, 2);
            $table->string('remarks')->nullable();
            $table->string('payment_terms')->nullable();
            $table->string('vat_inc')->nullable();
            $table->string('vat_ex')->nullable();
            $table->string('less_discount')->nullable();
            $table->string('vat')->nullable();
            $table->string('total_price')->nullable();
            $table->string('requested_by')->nullable();
            $table->string('prepared_by')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('status');
            $table->string('comments')->nullable();
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
        Schema::dropIfExists('procures');
    }
}
