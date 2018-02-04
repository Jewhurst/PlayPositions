<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Renamelineupscolumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lineups', function (Blueprint $table) {
            $table->dropColumn('lineup_info');
            $table->dropColumn('player_name');
            $table->text('positions')->nullable()->after('roster_handle');
            $table->string('playername',255)->nullable()->after('positions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lineups', function (Blueprint $table) {
            //
        });
    }
}
