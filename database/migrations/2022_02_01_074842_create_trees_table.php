<?php

use App\Models\PlantLocation;
use App\Models\TreeSpecies;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trees', function (Blueprint $table) {
            $table->id();
            $table->char('tree_id',8);
            $table->foreignIdFor(TreeSpecies::class)->references('id')->on('tree_species')->onDelete('cascade');
            $table->double('lon',9,6);
            $table->double('lat',9,6);
            $table->date('planting_date');
            $table->foreignIdFor(PlantLocation::class)->references('id')->on('plant_locations')->onDelete('cascade');
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
        Schema::dropIfExists('trees');
    }
}
