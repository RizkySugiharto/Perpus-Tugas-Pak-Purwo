<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {--u|username= : Username of the newly created user.} {--e|email= : E-Mail of the newly created user.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manually creates a new laravel user.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // Enter username, if not present via command line option
        $name = $this->option('username');
        if ($name === null) {
            $name = $this->ask('Please enter your username.');
        }

        // Enter email, if not present via command line option
        $email = $this->option('email');
        if ($email === null) {
            $email = $this->ask('Please enter your E-Mail.');
        }

        // Always enter password from userinput for more security.
        $password = $this->secret('Please enter a new password.');

        // Prepare input for the fortify user creation action
        $input = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ];

        try {
            $user = User::create($input);
        }
        catch (\Exception $e) {
            $this->error($e->getMessage());
            return;
        }

        // Success message
        $this->info('User created successfully!');
        $this->info('New user id: ' . $user->id);
    }
}
