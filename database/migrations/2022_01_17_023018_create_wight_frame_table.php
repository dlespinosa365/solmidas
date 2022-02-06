<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\LandCategory;

class CreateWightFrameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weight_frames', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(LandCategory::class)->nullable()->unsigned(); 
            $table->integer('zone')->nullable();
            $table->integer('hight')->nullable();
            $table->string('case', 2)->nullable();
            $table->integer('distenceBetweenColumns')->nullable();
            $table->integer('columnsHight')->nullable();
            $table->integer('distenceBetweenFrames')->nullable();
            $table->boolean('withPlatibanda')->nullable();
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
        Schema::dropIfExists('weight_frames');
    }
}
