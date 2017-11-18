<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeAndDifficultyToMissionsTable extends Migration
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
            $table->integer('mission_type_id')->unsigned();
            $table->foreign('mission_type_id')->references('id')->on('mission_types');

            // difficulty
            $table->integer('mission_difficulty_id')->unsigned()->nullable();
            $table->foreign('mission_difficulty_id')->references('id')->on('mission_difficulties');
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
            // type
            $table->dropForeign(['mission_type_id']);
            $table->dropColumn('mission_type_id');

            // difficulty
            $table->dropForeign(['mission_difficulty_id']);
            $table->dropColumn('mission_difficulty_id');

        });
    }
}
