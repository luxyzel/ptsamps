<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsArchivedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets_archived', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_type');
            $table->string('asset_tag');
            $table->string('service_tag');
            $table->string('serial_number');
            $table->string('status');
            $table->string('remarks');
            $table->string('deployment')->nullable();
            $table->timestamp('date');
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
        Schema::dropIfExists('assets_archived');
    }
}
