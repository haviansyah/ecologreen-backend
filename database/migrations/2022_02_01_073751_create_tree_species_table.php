<?php

use App\Models\CanopyShape;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreeSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tree_species', function (Blueprint $table) {
            $table->id();
            $table->string('local_name');
            $table->string('scientific_name');
            $table->double('sequestration');
            $table->double('max_height');
            $table->double('max_crown_width');
            $table->text('about')->nullable();
            $table->foreignIdFor(CanopyShape::class)->references('id')->on('canopy_shapes')->onDelete('cascade');
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
        Schema::dropIfExists('tree_species');
    }
}
