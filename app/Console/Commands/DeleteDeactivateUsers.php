<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteDeactivateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:delete-deactivate-users';

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
        $thresholdDate = Carbon::now()->subDays(30);
        $inactiveUsers = User::where('deleted_at', '<=', $thresholdDate)
            ->get();
        foreach ($inactiveUsers as $user) {
            $user->forceDelete();
        }
        $this->info(count($inactiveUsers) . ' inactive users deleted successfully.');
    }
}
