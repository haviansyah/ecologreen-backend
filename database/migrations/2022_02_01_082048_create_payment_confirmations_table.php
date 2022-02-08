<?php

use App\Models\BankAccount;
use App\Models\File;
use App\Models\PlantTreeTransaction;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_confirmations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(PlantTreeTransaction::class)->references('id')->on('plant_tree_transactions')->onDelete('cascade');
            $table->double('payment_total',20,2);
            $table->date('transaction_date');
            $table->text('note')->nullable();
            $table->foreignIdFor(BankAccount::class)->references('id')->on('bank_accounts')->onDelete('cascade');
            $table->foreignIdFor(File::class)->nullable()->references('id')->on('files')->onDelete('cascade');
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
        Schema::dropIfExists('payment_confirmations');
    }
}
