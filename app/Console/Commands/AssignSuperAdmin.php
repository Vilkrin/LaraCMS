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
    protected $description = 'Assign the Super Admin role to a user based on email address';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("User with email $email not found.");
            return;
        }

        // Ensure the 'super-admin' role exists
        $role = Role::where('name', 'Super Admin')->first();
        if (!$role) {
            $this->error("Super Admin role not found. Make sure it's created in the database.");
            return;
        }

        $user->assignRole($role->name);

        $this->info("User {$user->email} has been assigned the Super Admin role.");
    }
}
