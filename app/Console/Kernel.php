<?php

namespace App\Console;

use App\Console\Commands\CheckUnpaidPayment;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        CheckUnpaidPayment::class,
    ];
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('payments:check-unpaid-payment')->everyMinute();

    }

    
    
    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
