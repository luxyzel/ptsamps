<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsArchivedTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER Archive_assets AFTER DELETE ON `assets` FOR EACH ROW
        BEGIN
         INSERT INTO assets_archived (`category`, `model`, `st_msn`, `pdsn`, `asset_tag`, `asset_number`, `adapter`, `location`, `ws_no`, `st`, `s_n`, `mouse`, `keyboard`, `code`, `description`, `condition`, `status`, `date_delivered`, `warranty_ends`, `vendor`, `notes`, `created_at`, `updated_at` ) VALUES (old.category, old.model, old.st_msn, old.pdsn, old.asset_tag, old.asset_number, old.adapter, old.location, old.ws_no, old.st, old.s_n, old.mouse, old.keyboard, old.code, old.description, old.condition, old.status, old.date_delivered, old.warranty_ends, old.vendor, old.notes, now(), now());
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `Archive_assets`');
    }
}
