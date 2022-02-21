<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\RigidFrame;
use App\Models\Council;
use App\Models\LandCategory;
use App\Models\Estimate;
use App\Models\TileType;
use App\Models\CoverFacadeType;

class AddRelationsToStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('structures', function (Blueprint $table) {
             //RigidFrame relation
             $table->foreignIdFor(RigidFrame::class)->nullable()->unsigned();
             $table->foreignIdFor(Council::class)->nullable()->unsigned();
             $table->foreignIdFor(LandCategory::class)->nullable()->unsigned();
             $table->foreignIdFor(Estimate::class)->nullable()->unsigned();
             $table->foreignIdFor(TileType::class, 'cover_tile_type')->nullable()->unsigned();
             $table->foreignIdFor(TileType::class, 'facade_tile_type')->nullable()->unsigned();
             $table->foreignIdFor(CoverFacadeType::class, 'facade_type')->nullable()->unsigned();
             $table->foreignIdFor(CoverFacadeType::class, 'cover_type')->nullable()->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('structures', function (Blueprint $table) {
            $table->dropForeign(RigidFrame::class);
            $table->dropForeign(Council::class);
            $table->dropForeign(LandCategory::class);
            $table->dropForeign(CoverFacadeType::class);
            $table->dropForeign(Estimate::class);
            $table->dropForeign(TileType::class);
        });
    }
}
