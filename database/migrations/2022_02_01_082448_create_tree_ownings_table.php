<?php

use App\Models\PlantLocation;
use App\Models\TreeCatalog;
use App\Models\TreeSpecies;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreeOwningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tree_ownings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignIdFor(TreeSpecies::class)->references('id')->on('tree_species')->onDelete('cascade');
            $table->foreignIdFor(PlantLocation::class)->references('id')->on('plant_locations')->onDelete('cascade');
            $table->date('owned_at');
            $table->date('expired_at')->nullable();
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
        Schema::dropIfExists('tree_ownings');
    }
}
