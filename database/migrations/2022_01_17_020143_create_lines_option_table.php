<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Line;
use App\Models\Estimate;

class CreateLinesOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lines_option', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Estimate::class)->nullable()->unsigned(); 
            $table->foreignIdFor(Line::class)->nullable()->unsigned();
            $table->double('total')->default(0);
            $table->double('subtotal')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lines_option');
    }
}
