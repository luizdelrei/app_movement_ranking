<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterPersonalRecordDoubleFloat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personal_record', function (Blueprint $table) {
            DB::statement('ALTER TABLE `personal_record` CHANGE COLUMN `value` `value` FLOAT NOT NULL AFTER `movement_id`');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personal_record', function (Blueprint $table) {
            DB::statement('ALTER TABLE `personal_record` CHANGE COLUMN `value` `value` DOUBLE NOT NULL AFTER `movement_id`');
        });
    }
}
