<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetInactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:set-inactive-users';

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
        $inactiveLimit = now()->subHours(1);
        \App\Models\User::where('active_status', 1)
                        ->where('updated_at', '<', $inactiveLimit)
                        ->update(['active_status' => 0]);
    
        $this->info('Inactive users have been set to inactive status.');
    
    }
}
