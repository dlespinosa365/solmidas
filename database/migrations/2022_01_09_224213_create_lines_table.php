<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\LineCategory;

class CreateLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lines', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('number');
            $table->integer('order');
            $table->translatable('identifier');
            $table->translatable('description');
            $table->string('unit');
            $table->double('unitPrice')->default(0);
            $table->string('calculateFunction')->nullable();
            $table->string('constans')->nullable();
            $table->boolean('isUsedInForMainStructureCalculate')->default(false);
            $table->boolean('isUsedInSecondaryStructureCalculate')->default(false);
            $table->boolean('isUsedInMetalClosureCalculate')->default(false);
            $table->boolean('isUsedInFacadeClosureCalculate')->default(false);
            $table->foreignIdFor(LineCategory::class)->nullable()->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lines');
    }
}
