<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_tracks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phase_id')->constrained();
            $table->string('title');
            $table->timestamp('started_at')->nullable();
            $table->enum('in_break', ['ongoing', 'fixed'])->nullable();
            $table->json('breaks')->nullable();
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
        Schema::dropIfExists('live_tracks');
    }
}
