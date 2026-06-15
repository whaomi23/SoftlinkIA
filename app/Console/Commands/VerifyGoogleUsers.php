<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class VerifyGoogleUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:verify-google';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mark all users with Google ID as verified';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::whereNotNull('google_id')->where('verificado', '!=', 1)->get();

        if ($users->isEmpty()) {
            $this->info('No users found that need verification.');
            return;
        }

        $count = 0;
        foreach ($users as $user) {
            $user->update(['verificado' => 1]);
            $count++;
            $this->line("Verified user: {$user->email}");
        }

        $this->info("Successfully verified {$count} users with Google accounts.");
    }
}
