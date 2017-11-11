<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAlienTypesToAliens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aliens', function(Blueprint $table){
            $table->integer('alien_type_id')->unsigned()->nullable();
            $table->foreign('alien_type_id')->references('id')->on('alien_types')->onDelete('cascade');
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
            $table->dropForeign(['alien_type_id']);
            $table->dropColumn('alien_type_id');
        });
    }
}
