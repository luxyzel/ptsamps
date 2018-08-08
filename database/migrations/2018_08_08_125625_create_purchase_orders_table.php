<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('po_number');
            $table->date('request_date');
            $table->integer('vendor_id');
            $table->string('company_name');
            $table->string('contact_person');
            $table->string('designation');
            $table->string('email_address');
            $table->integer('contact_number');
            $table->string('company_address');
            $table->string('phone');
            $table->string('item');
            $table->integer('quantity');
            $table->string('uom');
            $table->string('description');
            $table->decimal('unitprice_php', 6, 2);
            $table->decimal('unitprice_usd', 6, 2);
            $table->decimal('item_totalprice_php', 7, 2);
            $table->decimal('item_totalprice_usd', 7, 2);
            $table->string('remarks')->nullable();
            $table->string('payment_terms')->nullable();
            $table->string('vat_inc')->nullable();
            $table->string('vat_ex')->nullable();
            $table->string('less_discount')->nullable();
            $table->string('vat')->nullable();
            $table->string('totalprice_php')->nullable();
            $table->string('totalprice_usd')->nullable();
            $table->string('status');
            $table->string('requested_by')->nullable();
            $table->string('prepared_by')->nullable();
            $table->string('approved_by')->nullable();
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
        Schema::dropIfExists('purchase_orders');
    }
}
