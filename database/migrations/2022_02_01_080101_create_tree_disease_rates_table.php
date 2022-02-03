<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreeDiseaseRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tree_disease_rates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type',['TOP','BOTTOM','MECHANIC']);
            $table->integer('rate');
            $table->timestamps();

            $table->index('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tree_disease_rates');
    }
}
