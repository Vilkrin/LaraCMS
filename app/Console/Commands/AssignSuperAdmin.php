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

        // if (!$this->confirm("Are you sure you want to assign 'Super Admin' role to {$email}?", false)) {
        //     $this->warn("Operation cancelled.");
        //     return;
        // }

        // Ensure the Super Admin role exists
        $role = Role::firstOrCreate(['name' => 'Super Admin']);

        if ($user->hasRole($role)) {
            $this->info("User {$user->email} already has the Super Admin role.");
            return;
        }

        // Assign the role
        $user->assignRole($role);

        $this->info("User {$user->email} has been assigned the Super Admin role.");
    }
}
