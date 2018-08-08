<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('contact_person');
            $table->string('designation')->nullable();
            $table->string('email_address');
            $table->string('contact_number')->nullable();
            $table->string('company_address')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('vat_number')->nullable();
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
        Schema::dropIfExists('vendors');
    }
}
