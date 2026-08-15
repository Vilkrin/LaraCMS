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

        throw_if(empty($tableNames), 'Error: config/permission.php not loaded. Run [php artisan config:clear] and try again.');
        throw_if($teams && empty($columnNames['team_foreign_key'] ?? null), 'Error: team_foreign_key on config/permission.php not loaded. Run [php artisan config:clear] and try again.');

        /**
         * See `docs/prerequisites.md` for suggested lengths on 'name' and 'guard_name' if "1071 Specified key was too long" errors are encountered.
         */
        Schema::create($tableNames['permissions'], static function (Blueprint $table) {
            $table->id(); // permission id
            $table->string('name');
            $table->string('guard_name');
            $table->timestamps();

            $table->unique(['name', 'guard_name']);
        });

        /**
         * See `docs/prerequisites.md` for suggested lengths on 'name' and 'guard_name' if "1071 Specified key was too long" errors are encountered.
         */
        Schema::create($tableNames['roles'], static function (Blueprint $table) use ($teams, $columnNames) {
            $table->id(); // role id
            if ($teams || config('permission.testing')) { // permission.testing is a fix for sqlite testing
                $table->unsignedBigInteger($columnNames['team_foreign_key'])->nullable();
                $table->index($columnNames['team_foreign_key'], 'roles_team_foreign_key_index');
            }
            $table->string('name');
            $table->string('guard_name');
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
                ->cascadeOnDelete();
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
                ->cascadeOnDelete();
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
                ->cascadeOnDelete();

            $table->foreign($pivotRole)
                ->references('id') // role id
                ->on($tableNames['roles'])
                ->cascadeOnDelete();

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
        Permission::create(['name' => 'view.posts']);
        Permission::create(['name' => 'create.posts']);
        Permission::create(['name' => 'edit.posts']);
        Permission::create(['name' => 'delete.posts']);
        Permission::create(['name' => 'publish.posts']);
        Permission::create(['name' => 'unpublish.posts']);
        Permission::create(['name' => 'view.unpublished.posts']);

        // Gallery
        Permission::create(['name' => 'view.images']);
        Permission::create(['name' => 'create.images']);
        Permission::create(['name' => 'edit.images']);
        Permission::create(['name' => 'delete.images']);
        Permission::create(['name' => 'manage.albums']);

        // Videos
        Permission::create(['name' => 'view.videos']);
        Permission::create(['name' => 'create.videos']);
        Permission::create(['name' => 'edit.videos']);
        Permission::create(['name' => 'delete.videos']);
        Permission::create(['name' => 'publish.videos']);
        Permission::create(['name' => 'unpublish.videos']);
        Permission::create(['name' => 'view.unpublished.videos']);

        // Events
        Permission::create(['name' => 'view.events']);
        Permission::create(['name' => 'create.events']);
        Permission::create(['name' => 'edit.events']);
        Permission::create(['name' => 'delete.events']);
        Permission::create(['name' => 'publish.events']);
        Permission::create(['name' => 'unpublish.events']);
        Permission::create(['name' => 'view.unpublished.events']);

        // General / Admin
        Permission::create(['name' => 'manage.users']);
        Permission::create(['name' => 'view.users']);
        Permission::create(['name' => 'ban.users']);
        Permission::create(['name' => 'unban.users']);
        Permission::create(['name' => 'manage.users.roles']);
        Permission::create(['name' => 'manage.site.settings']);
        Permission::create(['name' => 'manage.site.content']);
        Permission::create(['name' => 'access.admin.panel']);

        // Notifications
        Permission::create(['name' => 'receive.github.notifications']);
        Permission::create(['name' => 'receive.user.registration.notifications']);

        // Pages
        Permission::create(['name' => 'view.pages']);
        Permission::create(['name' => 'create.pages']);
        Permission::create(['name' => 'edit.pages']);
        Permission::create(['name' => 'delete.pages']);
        Permission::create(['name' => 'publish.pages']);
        Permission::create(['name' => 'unpublish.pages']);
        Permission::create(['name' => 'view.unpublished.pages']);

        // Menus
        Permission::create(['name' => 'manage.menus']);

        // Permissions / Roles
        Permission::create(['name' => 'manage.roles']);
        Permission::create(['name' => 'manage.permissions']);

        // Activity Logs / Monitoring
        Permission::create(['name' => 'view.activity.logs']);
        Permission::create(['name' => 'export.activity.logs']);

        // Update cache to ensure newly created permissions are recognized
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles and assign permissions
        // Writer
        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo([
            'view.posts',
            'create.posts',
            'edit.posts',
            'delete.posts',
        ]);

        // Editor
        $role = Role::create(['name' => 'editor']);
        $role->givePermissionTo([
            'view.posts',
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
            'access.admin.panel',
            'view.users',
            'manage.users',
            'ban.users',
            'unban.users',
            'manage.users.roles',
            'view.posts',
            'create.posts',
            'edit.posts',
            'delete.posts',
            'view.unpublished.posts',
            'publish.posts',
            'unpublish.posts',
            'view.pages',
            'create.pages',
            'edit.pages',
            'delete.pages',
            'publish.pages',
            'unpublish.pages',
            'view.unpublished.pages',
            'manage.menus',
            'create.events',
            'view.events',
            'edit.events',
            'delete.events',
            'publish.events',
            'unpublish.events',
            'view.unpublished.events',
            'view.images',
            'create.images',
            'edit.images',
            'delete.images',
            'manage.albums',
            'view.videos',
            'create.videos',
            'edit.videos',
            'delete.videos',
            'publish.videos',
            'unpublish.videos',
            'view.unpublished.videos',
            'manage.roles',
            'manage.permissions',
            'manage.site.settings',
            'manage.site.content',
            'view.activity.logs',
            'export.activity.logs',
            'receive.github.notifications',

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

        throw_if(empty($tableNames), 'Error: config/permission.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');

        Schema::dropIfExists($tableNames['role_has_permissions']);
        Schema::dropIfExists($tableNames['model_has_roles']);
        Schema::dropIfExists($tableNames['model_has_permissions']);
        Schema::dropIfExists($tableNames['roles']);
        Schema::dropIfExists($tableNames['permissions']);
    }
};
