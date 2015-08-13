<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTraceResultionToTracesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_traces', function (Blueprint $table) {
            $table->tinyInteger('viewport_x')->nullable();
            $table->tinyInteger('viewport_y')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_traces', function (Blueprint $table) {
            $table->dropColumn('viewport_x');
            $table->dropColumn('viewport_y');
        });
    }
}
