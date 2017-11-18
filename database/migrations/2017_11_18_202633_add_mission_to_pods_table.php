<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMissionToPodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pods', function (Blueprint $table) {
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
        Schema::table('pods', function(Blueprint $table){
            $table->dropForeign(['mission_id']);
            $table->dropColumn('mission_id');

        });
    }
}
