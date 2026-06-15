<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class VerifyAllUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:verify-all {--email= : Verify specific email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mark users as verified (for testing purposes)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->option('email');

        if ($email) {
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->update(['verificado' => 1]);
                $this->info("Verified user: {$user->email}");
            } else {
                $this->error("User not found: {$email}");
            }
            return;
        }

        $users = User::where('verificado', '!=', 1)->get();

        if ($users->isEmpty()) {
            $this->info('All users are already verified.');
            return;
        }

        $count = 0;
        foreach ($users as $user) {
            $user->update(['verificado' => 1]);
            $count++;
            $this->line("Verified user: {$user->email}");
        }

        $this->info("Successfully verified {$count} users.");
    }
}
