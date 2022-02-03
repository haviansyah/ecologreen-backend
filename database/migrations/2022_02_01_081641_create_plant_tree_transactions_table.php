<?php

use App\Models\PaymentStatus;
use App\Models\TreeCatalog;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantTreeTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_tree_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreignIdFor(User::class)->references('id')->on('users')->onDelete('cascade');
            $table->foreignIdFor(TreeCatalog::class)->references('id')->on('tree_catalogs')->onDelete('cascade');
            $table->integer('quantity');
            $table->double('unit_price',20,2);
            $table->integer('unique_code');
            $table->foreignIdFor(PaymentStatus::class)->references('id')->on('payment_statuses')->onDelete('cascade');

            $table->timestamps();

            $table->index('code');
            $table->unique('code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plant_tree_transactions');
    }
}
