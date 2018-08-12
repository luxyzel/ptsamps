<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_type')->nullable();
            $table->string('model')->nullable();
            $table->string('st_msn')->nullable();
            $table->string('pdsn')->nullable();
            $table->string('asset_tag')->nullable();
            $table->string('asset_number')->nullable();
            $table->string('adapter')->nullable();
            $table->string('location')->nullable();
            $table->string('ws_no')->nullable();
            $table->string('st')->nullable();
            $table->string('s_n')->nullable();
            $table->string('mouse')->nullable();
            $table->string('keyboard')->nullable();
            $table->string('code')->nullable();
            $table->string('description')->nullable();
            $table->string('condition')->nullable();
            $table->string('status')->nullable();
            $table->date('date_delivered')->nullable();
            $table->string('warranty_ends')->nullable();
            $table->string('vendor')->nullable();
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
        Schema::dropIfExists('assets');
    }
}
