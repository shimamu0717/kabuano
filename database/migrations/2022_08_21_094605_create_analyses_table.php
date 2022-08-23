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
        Schema::create('analyses', function (Blueprint $table) {
            $table->id();
            $table->integer('code');
            $table->string('company');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('start_price');
            $table->string('open_or_close');
            $table->date('end_price');
            $table->integer('high');
            $table->integer('low');
            $table->integer('yield');
            $table->integer('yield_ratio');
            $table->text('comment')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analyses');
    }
};
