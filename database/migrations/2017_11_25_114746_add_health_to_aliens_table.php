<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHealthToAliensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aliens', function (Blueprint $table) {
            $table->integer('max_health')->unsigned()->nullable();
            $table->integer('current_health')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aliens', function(Blueprint $table) {
            $table->dropColumn('max_health');
            $table->dropColumn('current_health');
        });
    }
}
