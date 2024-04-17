<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteUnverifiedUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:delete-unverified-users';

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
        $usersToDelete = User::whereNull('email_verified_at')
            ->where('created_at', '<=', Carbon::now()->subWeek())
            ->get();

        foreach ($usersToDelete as $user) {
            $user->forceDelete();
            $this->info("User {$user->email} has been deleted.");
        }

        $this->info('Unverified users have been deleted successfully.');
    }
}
