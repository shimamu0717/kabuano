<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('analyzes', function (Blueprint $table) {
            $table->integer('end_price')->change();

            $table->string('end_open_or_close')->after('end_price');

            $table->renameColumn('open_or_close', 'start_open_or_close');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('analyzes', function (Blueprint $table) {
            //
        });
    }
};
