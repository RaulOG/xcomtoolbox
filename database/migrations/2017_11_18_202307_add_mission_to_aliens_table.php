<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMissionToAliensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aliens', function (Blueprint $table) {
            // type
            $table->integer('mission_id')->unsigned()->nullable();
            $table->foreign('mission_id')->references('id')->on('missions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aliens', function(Blueprint $table){
            $table->dropForeign(['mission_id']);
            $table->dropColumn('mission_id');

        });
    }
}
