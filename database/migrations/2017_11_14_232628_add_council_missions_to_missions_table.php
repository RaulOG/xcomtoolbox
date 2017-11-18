<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCouncilMissionsToMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('missions', function (Blueprint $table) {
            // type
            $table->integer('council_mission_id')->unsigned()->nullable();
            $table->foreign('council_mission_id')->references('id')->on('council_missions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('missions', function(Blueprint $table){
            $table->dropForeign(['council_mission_id']);
            $table->dropColumn('council_mission_id');

        });
    }
}
