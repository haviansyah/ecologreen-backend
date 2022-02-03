<?php

use App\Models\Tree;
use App\Models\TreeDiseaseRate;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreeConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tree_conditions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tree::class)->references('id')->on('trees')->onDelete('cascade');

            $table->double('height');
            $table->double('dbh');
            $table->double('crown_width');

            $table->foreignIdFor(TreeDiseaseRate::class,'top_disease_id')->references('id')->on('tree_disease_rates')->onDelete('cascade');
            $table->foreignIdFor(TreeDiseaseRate::class,'bottom_disease_id')->references('id')->on('tree_disease_rates')->onDelete('cascade');
            $table->foreignIdFor(TreeDiseaseRate::class,'mechanic_disease_id')->references('id')->on('tree_disease_rates')->onDelete('cascade');

            $table->timestamp('inspection_at');
            $table->foreignIdFor(User::class,'inspector_user_id')->nullable()->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('tree_conditions');
    }
}
