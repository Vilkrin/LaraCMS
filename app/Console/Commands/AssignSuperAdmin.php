<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AssignSuperAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:assign-super-admin {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign the Super Admin role to a user by email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');

        // Find the user by email
        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("User with email {$email} not found.");
            return;
        }

        // Ensure the Super Admin role exists
        $role = Role::firstOrCreate(['name' => 'Super Admin']);

        // Check if the user already has the role
        if ($user->hasRole($role)) {
            $this->info("User {$user->email} already has the Super Admin role.");
            return;
        }

        // Assign the role
        $user->assignRole($role);

        $this->info("User {$user->email} has been assigned the Super Admin role.");
    }
}
