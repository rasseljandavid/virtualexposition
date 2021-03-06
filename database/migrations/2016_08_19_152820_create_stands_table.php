<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('type');
            $table->string('posx');
            $table->string('posy');
            $table->double('price', 15, 4);
            $table->integer('event_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('totalVisit')->unsigned()->default(0);
            $table->integer('totalDownload')->unsigned()->default(0);
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
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
        Schema::drop('stands');
    }
}
