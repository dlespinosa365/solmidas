<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoundationVolumeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foundation_volumes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('distenceBetweenColumns')->nullable();
            $table->integer('columnsHight')->nullable();
            $table->integer('distenceBetweenFrames')->nullable();
            $table->double('total')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foundation_volumes');
    }
}
