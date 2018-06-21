<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersArchivedTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER Archive_users AFTER DELETE ON `users` FOR EACH ROW
        BEGIN
         INSERT INTO users_archived (`username`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (old.username, old.name, old.email, old.password, old.remember_token, now(), null);
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
        DB::unprepared('DROP TRIGGER `Archive_users`');
    }
}
