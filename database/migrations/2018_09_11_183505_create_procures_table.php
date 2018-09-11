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
            $table->integer('po_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->datetime('request_date')->nullable();
            $table->integer('vendor_id');
            $table->integer('requestor_id');
            $table->string('item');
            $table->integer('quantity');
            $table->string('uom')->nullable();
            $table->string('description')->nullable();
            $table->decimal('unit_price', 8, 2);
            $table->decimal('total_price', 10, 2);
            $table->string('requested_by')->nullable();
            $table->string('prepared_by')->nullable();
            $table->integer('approver_id')->nullable();
            $table->string('status')->nullable();
            $table->date('date')->nullable();
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
