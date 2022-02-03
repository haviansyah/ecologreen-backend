<?php

use App\Models\Tree;
use App\Models\TreeOwning;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreeOwningTreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tree_owning_tree', function (Blueprint $table) {
            $table->foreignIdFor(TreeOwning::class)->references('id')->on('tree_ownings')->onDelete('cascade');
            $table->foreignIdFor(Tree::class)->references('id')->on('trees')->onDelete('cascade');

            $table->primary(['tree_owning_id','tree_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tree_owning_tree');
    }
}
