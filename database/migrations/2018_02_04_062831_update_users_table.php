<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::update('rosters', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('handle', 255);
//            $table->integer('created_by');
//            $table->text('table_html');
//            $table->timestamps();
////  `id` int(11) NOT NULL AUTO_INCREMENT,
////  `slug` varchar(25) NOT NULL,
////  `maker` text NOT NULL,
////  `datemade` datetime NOT NULL,
////  `tablehtml` text NOT NULL,
//        });
        Schema::table('rosters', function (Blueprint $table) {
            $table->string('title', 255)->nullable()->after('handle');
            $table->text('names')->nullable()->after('title');
            $table->string('teamname',225)->nullable()->after('names');
            $table->string('league',10)->nullable()->after('teamname');
            $table->string('type',125)->nullable()->after('league');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
