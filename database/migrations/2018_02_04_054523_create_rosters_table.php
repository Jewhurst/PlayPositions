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
            $table->string('handle', 255);
            $table->integer('created_by');
            $table->text('table_html');
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
