<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AssetsArchivedTrigger extends Migration
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
         INSERT INTO assets_archived (`category_type`, `asset_tag`, `service_tag`, `serial_number`, `status`, `remarks`, `deployment`, `date`, `created_at`, `updated_at`) VALUES (old.category_type, old.asset_tag, old.service_tag, old.serial_number, old.status, old.remarks, old.deployment, old.created_at, now(), null);
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
