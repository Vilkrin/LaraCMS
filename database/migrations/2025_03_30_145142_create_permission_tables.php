<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $teams = config('permission.teams');
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');
        $pivotRole = $columnNames['role_pivot_key'] ?? 'role_id';
        $pivotPermission = $columnNames['permission_pivot_key'] ?? 'permission_id';

        if (empty($tableNames)) {
            throw new \Exception('Error: config/permission.php not loaded. Run [php artisan config:clear] and try again.');
        }
        if ($teams && empty($columnNames['team_foreign_key'] ?? null)) {
            throw new \Exception('Error: team_foreign_key on config/permission.php not loaded. Run [php artisan config:clear] and try again.');
        }

        Schema::create($tableNames['permissions'], static function (Blueprint $table) {
            // $table->engine('InnoDB');
            $table->bigIncrements('id'); // permission id
            $table->string('name');       // For MyISAM use string('name', 225); // (or 166 for InnoDB with Redundant/Compact row format)
            $table->string('guard_name'); // For MyISAM use string('guard_name', 25);
            $table->timestamps();

            $table->unique(['name', 'guard_name']);
        });

        Schema::create($tableNames['roles'], static function (Blueprint $table) use ($teams, $columnNames) {
            // $table->engine('InnoDB');
            $table->bigIncrements('id'); // role id
            if ($teams || config('permission.testing')) { // permission.testing is a fix for sqlite testing
                $table->unsignedBigInteger($columnNames['team_foreign_key'])->nullable();
                $table->index($columnNames['team_foreign_key'], 'roles_team_foreign_key_index');
            }
            $table->string('name');       // For MyISAM use string('name', 225); // (or 166 for InnoDB with Redundant/Compact row format)
            $table->string('guard_name'); // For MyISAM use string('guard_name', 25);
            $table->timestamps();
            if ($teams || config('permission.testing')) {
                $table->unique([$columnNames['team_foreign_key'], 'name', 'guard_name']);
            } else {
                $table->unique(['name', 'guard_name']);
            }
        });

        Schema::create($tableNames['model_has_permissions'], static function (Blueprint $table) use ($tableNames, $columnNames, $pivotPermission, $teams) {
            $table->unsignedBigInteger($pivotPermission);

            $table->string('model_type');
            $table->unsignedBigInteger($columnNames['model_morph_key']);
            $table->index([$columnNames['model_morph_key'], 'model_type'], 'model_has_permissions_model_id_model_type_index');

            $table->foreign($pivotPermission)
                ->references('id') // permission id
                ->on($tableNames['permissions'])
                ->onDelete('cascade');
            if ($teams) {
                $table->unsignedBigInteger($columnNames['team_foreign_key']);
                $table->index($columnNames['team_foreign_key'], 'model_has_permissions_team_foreign_key_index');

                $table->primary(
                    [$columnNames['team_foreign_key'], $pivotPermission, $columnNames['model_morph_key'], 'model_type'],
                    'model_has_permissions_permission_model_type_primary'
                );
            } else {
                $table->primary(
                    [$pivotPermission, $columnNames['model_morph_key'], 'model_type'],
                    'model_has_permissions_permission_model_type_primary'
                );
            }
        });

        Schema::create($tableNames['model_has_roles'], static function (Blueprint $table) use ($tableNames, $columnNames, $pivotRole, $teams) {
            $table->unsignedBigInteger($pivotRole);

            $table->string('model_type');
            $table->unsignedBigInteger($columnNames['model_morph_key']);
            $table->index([$columnNames['model_morph_key'], 'model_type'], 'model_has_roles_model_id_model_type_index');

            $table->foreign($pivotRole)
                ->references('id') // role id
                ->on($tableNames['roles'])
                ->onDelete('cascade');
            if ($teams) {
                $table->unsignedBigInteger($columnNames['team_foreign_key']);
                $table->index($columnNames['team_foreign_key'], 'model_has_roles_team_foreign_key_index');

                $table->primary(
                    [$columnNames['team_foreign_key'], $pivotRole, $columnNames['model_morph_key'], 'model_type'],
                    'model_has_roles_role_model_type_primary'
                );
            } else {
                $table->primary(
                    [$pivotRole, $columnNames['model_morph_key'], 'model_type'],
                    'model_has_roles_role_model_type_primary'
                );
            }
        });

        Schema::create($tableNames['role_has_permissions'], static function (Blueprint $table) use ($tableNames, $pivotRole, $pivotPermission) {
            $table->unsignedBigInteger($pivotPermission);
            $table->unsignedBigInteger($pivotRole);

            $table->foreign($pivotPermission)
                ->references('id') // permission id
                ->on($tableNames['permissions'])
                ->onDelete('cascade');

            $table->foreign($pivotRole)
                ->references('id') // role id
                ->on($tableNames['roles'])
                ->onDelete('cascade');

            $table->primary([$pivotPermission, $pivotRole], 'role_has_permissions_permission_id_role_id_primary');
        });

        app('cache')
            ->store(config('permission.cache.store') != 'default' ? config('permission.cache.store') : null)
            ->forget(config('permission.cache.key'));

        // Seeding Initial User Roles & Permissions

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        // Posts
        Permission::create(['name' => 'create.posts']);
        Permission::create(['name' => 'edit.posts']);
        Permission::create(['name' => 'delete.posts']);
        Permission::create(['name' => 'publish.posts']);
        Permission::create(['name' => 'unpublish.posts']);
        Permission::create(['name' => 'view.unpublished.posts']);

        // Gallery
        Permission::create(['name' => 'create.images']);
        Permission::create(['name' => 'edit.images']);
        Permission::create(['name' => 'delete.images']);
        Permission::create(['name' => 'manage.albums']);

        // Videos
        Permission::create(['name' => 'create.videos']);
        Permission::create(['name' => 'edit.videos']);
        Permission::create(['name' => 'delete.videos']);
        Permission::create(['name' => 'publish.videos']);
        Permission::create(['name' => 'unpublish.videos']);
        Permission::create(['name' => 'view.unpublished.videos']);

        // Events
        Permission::create(['name' => 'create.events']);
        Permission::create(['name' => 'edit.events']);
        Permission::create(['name' => 'delete.events']);
        Permission::create(['name' => 'publish.events']);
        Permission::create(['name' => 'unpublish.events']);
        Permission::create(['name' => 'view.unpublished.events']);

        // Org / Members
        Permission::create(['name' => 'view.member.dashboard']);
        Permission::create(['name' => 'manage.org.members']);
        Permission::create(['name' => 'assign.org.roles']);
        Permission::create(['name' => 'manage.org.settings']);

        // General / Admin
        Permission::create(['name' => 'manage.users']);
        Permission::create(['name' => 'access.admin.panel']);

        // Update cache to ensure newly created permissions are recognized
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles and assign permissions
        // Writer
        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo([
            'create.posts',
            'edit.posts',
            'delete.posts',
        ]);

        // Editor
        $role = Role::create(['name' => 'editor']);
        $role->givePermissionTo([
            'create.posts',
            'edit.posts',
            'delete.posts',
            'publish.posts',
            'unpublish.posts',
            'view.unpublished.posts',
            'access.admin.panel',
        ]);

        // Admin
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo([
            'manage.users',
            'access.admin.panel',
            'view.unpublished.posts',
            'publish.posts',
            'unpublish.posts',
            'create.events',
            'edit.events',
            'delete.events',
            'publish.events',
            'unpublish.events',
            'view.unpublished.events',
            'create.images',
            'edit.images',
            'delete.images',
            'manage.albums',
            'create.videos',
            'edit.videos',
            'delete.videos',
            'publish.videos',
            'unpublish.videos',
            'view.unpublished.videos',
            'manage.org.members',
            'assign.org.roles',
            'manage.org.settings',
        ]);

        // Org Member
        $role = Role::create(['name' => 'org member']);
        $role->givePermissionTo([
            'view.member.dashboard',
        ]);

        // User
        $role = Role::create(['name' => 'user']);
        // no perms – just a base role for logged-in accounts

        // Super Admin
        $role = Role::create(['name' => 'Super Admin']);
        // no perms – full access handled by Gate::before

        // Refresh permission cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tableNames = config('permission.table_names');

        if (empty($tableNames)) {
            throw new \Exception('Error: config/permission.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
        }

        Schema::drop($tableNames['role_has_permissions']);
        Schema::drop($tableNames['model_has_roles']);
        Schema::drop($tableNames['model_has_permissions']);
        Schema::drop($tableNames['roles']);
        Schema::drop($tableNames['permissions']);
    }
};
