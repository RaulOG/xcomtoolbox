<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUfosToMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('missions', function (Blueprint $table) {
            $table->integer('ufo_id')->unsigned()->nullable();
            $table->foreign('ufo_id')->references('id')->on('ufos');
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
            $table->dropForeign(['ufo_id']);
            $table->dropColumn('ufo_id');
        });
    }
}
