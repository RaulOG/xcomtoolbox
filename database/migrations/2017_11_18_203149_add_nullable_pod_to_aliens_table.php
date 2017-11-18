<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullablePodToAliensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::disableForeignKeyConstraints();

        Schema::table('aliens', function (Blueprint $table) {
            $table->integer('pod_id')->unsigned()->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::disableForeignKeyConstraints();

        Schema::table('aliens', function(Blueprint $table){
            $table->integer('pod_id')->unsigned()->nullable(false)->change();

        });
    }
}
