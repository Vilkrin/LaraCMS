<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

#[Signature('app:assign-super-admin {email}')]
#[Description('Assign the Super Admin role to a user by email')]
class AssignSuperAdmin extends Command
{
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

        // Find the existing Super Admin role
        $role = Role::where('name', 'Super Admin')->first();

        if (!$role) {
            $this->error('The Super Admin role does not exist.');
            $this->error('Please run the roles and permissions seeder first.');
            return;
        }

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
