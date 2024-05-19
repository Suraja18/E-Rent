<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
class DeleteDeactivateUsers extends Command
{
    protected $signature = 'users:delete-deactivate-users';
    protected $description = 'This command deletes the user data permanently after 30 days';
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
