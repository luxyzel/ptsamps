<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerepheralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perepherals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->string('model');
            $table->string('stmsn');
            $table->string('pdsn');
            $table->string('asset_tag');
            $table->string('condition')->nullable();
            $table->string('status')->nullable();
            $table->date('date_delivered');
            $table->string('warranty_ends');
            $table->string('vendor');
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('perepherals');
    }
}
