<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExpectedAliensToMissionDifficultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mission_difficulties', function (Blueprint $table) {
            $table->tinyInteger('min_pod_count');
            $table->tinyInteger('max_pod_count');
            $table->tinyInteger('min_alien_count');
            $table->tinyInteger('max_alien_count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mission_difficulties', function(Blueprint $table){
            $table->dropColumn('min_pod_count');
            $table->dropColumn('max_pod_count');
            $table->dropColumn('min_alien_count');
            $table->dropColumn('max_alien_count');

        });
    }
}
