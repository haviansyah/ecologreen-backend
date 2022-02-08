<?php

use App\Models\PlantTreeTransaction;
use App\Models\Tree;
use App\Models\TreeOwning;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_tree', function (Blueprint $table) {
            $table->foreignIdFor(PlantTreeTransaction::class)->references('id')->on('plant_tree_transactions')->onDelete('cascade');
            $table->foreignIdFor(Tree::class)->references('id')->on('trees')->onDelete('cascade');
            $table->primary(['plant_tree_transaction_id','tree_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_tree');
    }
}
