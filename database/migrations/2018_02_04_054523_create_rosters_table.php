<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRostersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rosters', function (Blueprint $table) {
            $table->increments('id');

            $table->string('roster_id', 255);
            $table->integer('created_by');
            $table->string('team_name');
            $table->string('team_name_slug');
            $table->integer('innings')->nullable(false);
            $table->integer('players')->nullable(false);
            $table->dateTime('game_date')->nullable();
            $table->timestamps();


//  `id` int(11) NOT NULL AUTO_INCREMENT,
//  `slug` varchar(25) NOT NULL,
//  `maker` text NOT NULL,
//  `datemade` datetime NOT NULL,
//  `tablehtml` text NOT NULL,
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rosters');
    }
}
