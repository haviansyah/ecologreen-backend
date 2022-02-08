<?php

namespace App\Console\Commands;

use App\Models\PaymentStatus;
use App\Models\PlantTreeTransaction;
use Illuminate\Console\Command;

class PaymentCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Find Payment That Waiting For Payment
        PlantTreeTransaction::
            wherePaymentStatusId(PaymentStatus::WAITING)
            ->whereRaw('DATE_ADD(`created_at`, INTERVAL 1 DAY) < NOW()')->update([
                'payment_status_id' => 3
            ]);
        return 0;
    }
}
