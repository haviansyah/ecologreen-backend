<?php

use App\Models\PlantLocation;
use App\Models\TreeSpecies;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreeCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tree_catalogs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TreeSpecies::class)->references('id')->on('tree_species')->onDelete('cascade');
            $table->foreignIdFor(PlantLocation::class)->references('id')->on('plant_locations')->onDelete('cascade');
            $table->double('price',20,2);
            $table->enum('status',['PUBLISH','DRAFT'])->default('DRAFT');
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
        Schema::dropIfExists('tree_catalogs');
    }
}
