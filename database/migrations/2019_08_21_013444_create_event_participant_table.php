<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventParticipantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_participant', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events');
            $table->bigInteger('participant_id')->unsigned();
            $table->foreign('participant_id')->references('id')->on('participants');
            $table->string('mobile');
            $table->string('email')->nullable();
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
        Schema::dropIfExists('event_participant');
    }
}
