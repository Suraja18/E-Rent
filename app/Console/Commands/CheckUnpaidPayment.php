<?php

namespace App\Console\Commands;

use App\Models\RentPayment;
use Illuminate\Console\Command;

class CheckUnpaidPayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payments:check-unpaid-payment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $unpaidPayments = RentPayment::where('status', 'Unpaid')->get();

        foreach ($unpaidPayments as $payment) {
            $payment->delete();
            $this->info("Deleted unpaid payment ID: {$payment->id}");
        }

        $this->info('Unpaid payments check completed.');
    }
}
