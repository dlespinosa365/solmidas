<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreateStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structures', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('code')->nullable();
            $table->longText('description')->nullable();
            $table->string('title')->nullable();
            $table->boolean('isPublic')->default(false);
            $table->boolean('withPlatibanda')->default(false);
            $table->integer('distanceBetweenFrames')->nullable();
            $table->integer('shipLength')->nullable();
            $table->integer('distanceBetweenColumns')->nullable();
            $table->integer('columnHeight')->nullable();
            $table->integer('altitudeOfTheWork')->nullable();
            $table->boolean('shoes')->default(false);
            $table->boolean('floor')->default(false);
            $table->integer('coverDensity')->nullable();
            $table->integer('facadeDensity')->nullable();
            $table->boolean('metalClosure')->default(false);
            $table->boolean('anticorrosiveTreatment')->default(false);
            $table->boolean('emergencyDoors')->default(false);
            $table->integer('emergencyDoorsCount')->nullable();
            $table->integer('emergencyDoorsHeight')->nullable();
            $table->integer('emergencyDoorswidth')->nullable();
            $table->boolean('serviceDoors')->default(false);
            $table->integer('serviceDoorsCount')->nullable();
            $table->integer('serviceDoorsHeight')->nullable();
            $table->integer('serviceDoorswidth')->nullable();
            $table->boolean('sectionedDoorsLessThan16')->default(false);
            $table->integer('sectionedDoorsLessThan16Count')->nullable();
            $table->integer('sectionedDoorsLessThan16Height')->nullable();
            $table->integer('sectionedDoorsLessThan16width')->nullable();
            $table->boolean('sectionedDoorsMajorThan16')->default(false);
            $table->integer('sectionedDoorsMajorThan16Count')->nullable();
            $table->integer('sectionedDoorsMajorThan16Height')->nullable();
            $table->integer('sectionedDoorsMajorThan16width')->nullable();
            $table->boolean('requireMontage')->default(false);

            $table->double('weightFrame')->default(0);
            $table->double('foundationVolume')->default(0);
            $table->double('countFrame')->default(0);

            //user relation
            $table->foreignIdFor(User::class)->nullable()->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('structures');
    }
}
