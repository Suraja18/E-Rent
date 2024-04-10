<?php

namespace App\Console\Commands;

use App\Models\RentedProperty;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckCancelledProperties extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rental:check-cancelled-properties';

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
        $cancelledProperties = RentedProperty::where('status', 'Cancelled')
                                ->whereNull('deleted_at')
                                ->update(['deleted_at' => Carbon::now()]);

        $this->info('Cancelled properties updated successfully.');
    }
}
