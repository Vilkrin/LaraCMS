<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;
use App\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->foreignIdFor(Permission::class)->constrained();
            $table->foreignIdFor(Role::class)->constrained();
        });

        // Assign Permissions to Roles
        $rolePermissions = [
            'Admin' => ['manage_users', 'edit_posts', 'delete_posts', 'view_reports'],
            'Editor' => ['edit_posts', 'view_reports'],
            'User' => []
        ];

        foreach ($rolePermissions as $role => $perms) {
            $roleId = DB::table('roles')->where('name', $role)->value('id');

            foreach ($perms as $permName) {
                $permId = DB::table('permissions')->where('name', $permName)->value('id');
                DB::table('permission_role')->insert(['role_id' => $roleId, 'permission_id' => $permId]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission_role');
    }
};
