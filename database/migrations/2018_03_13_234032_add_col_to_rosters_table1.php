<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColToRostersTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rosters', function (Blueprint $table) {
            $table->string('league')->nullable()->after('game_date');
            $table->string('type')->nullable()->after('league');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rosters', function (Blueprint $table) {
            //
        });
    }
}
