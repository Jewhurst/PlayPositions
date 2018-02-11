<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPositionsLineupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_lineup', function (Blueprint $table) {
            $table->increments('id');
            $table->string('roster_id',255)->nullable();
            $table->text('player_position')->nullable();
            $table->dateTime('game_date')->nullable();
            $table->string('team_name',255)->nullable();
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
        Schema::dropIfExists('position_lineup');
    }
}
