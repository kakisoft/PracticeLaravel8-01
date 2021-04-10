<?php

use Illuminate\Database\Migrations\Migration;

class AppendTableNameCommentMysql extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Return if the database driver is not MySQL.
        if (DB::getDriverName() !== 'mysql') {
            return;
        }

        DB::statement("ALTER TABLE `artists` COMMENT 'artists'");
        DB::statement("ALTER TABLE `songs` COMMENT 'songs'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Return if the database driver is not MySQL.
        if (DB::getDriverName() !== 'mysql') {
            return;
        }

        DB::statement("ALTER TABLE `artists` COMMENT ''");
        DB::statement("ALTER TABLE `songs` COMMENT ''");

    }
}
