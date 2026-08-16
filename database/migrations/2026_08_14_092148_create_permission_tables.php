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

        /*
        |--------------------------------------------------------------------------
        | Permissions
        |--------------------------------------------------------------------------
        */

        // Dashboard / Admin
        Permission::create(['name' => 'access.admin.panel']);
        Permission::create(['name' => 'view.dashboard']);

        // Pages
        Permission::create(['name' => 'view.pages']);
        Permission::create(['name' => 'create.pages']);
        Permission::create(['name' => 'edit.pages']);
        Permission::create(['name' => 'delete.pages']);
        Permission::create(['name' => 'publish.pages']);
        Permission::create(['name' => 'view.unpublished.pages']);

        // Blog Posts
        Permission::create(['name' => 'view.posts']);
        Permission::create(['name' => 'create.posts']);
        Permission::create(['name' => 'edit.posts']);
        Permission::create(['name' => 'delete.posts']);
        Permission::create(['name' => 'publish.posts']);
        Permission::create(['name' => 'view.unpublished.posts']);

        // Gallery - Albums
        Permission::create(['name' => 'view.albums']);
        Permission::create(['name' => 'create.albums']);
        Permission::create(['name' => 'edit.albums']);
        Permission::create(['name' => 'delete.albums']);

        // Gallery - Images
        Permission::create(['name' => 'view.images']);
        Permission::create(['name' => 'upload.images']);
        Permission::create(['name' => 'edit.images']);
        Permission::create(['name' => 'delete.images']);
        Permission::create(['name' => 'move.images']);

        // User Management
        Permission::create(['name' => 'view.users']);
        Permission::create(['name' => 'create.users']);
        Permission::create(['name' => 'edit.users']);
        Permission::create(['name' => 'delete.users']);
        Permission::create(['name' => 'ban.users']);
        Permission::create(['name' => 'unban.users']);
        Permission::create(['name' => 'impersonate.users']);
        Permission::create(['name' => 'verify.users']);

        // Roles
        Permission::create(['name' => 'view.roles']);
        Permission::create(['name' => 'create.roles']);
        Permission::create(['name' => 'edit.roles']);
        Permission::create(['name' => 'delete.roles']);
        Permission::create(['name' => 'assign.roles']);

        // Permissions
        Permission::create(['name' => 'view.permissions']);
        Permission::create(['name' => 'edit.permissions']);

        // Menus
        Permission::create(['name' => 'view.menus']);
        Permission::create(['name' => 'create.menus']);
        Permission::create(['name' => 'edit.menus']);
        Permission::create(['name' => 'delete.menus']);

        // Settings
        Permission::create(['name' => 'manage.settings.general']);
        Permission::create(['name' => 'manage.settings.seo']);
        Permission::create(['name' => 'manage.settings.email']);
        Permission::create(['name' => 'manage.settings.social']);
        Permission::create(['name' => 'manage.settings.theme']);
        Permission::create(['name' => 'manage.settings.storage']);
        Permission::create(['name' => 'manage.settings.security']);
        Permission::create(['name' => 'manage.settings.integrations']);

        // SEO
        Permission::create(['name' => 'view.seo']);
        Permission::create(['name' => 'edit.seo']);

        // Activity Logs
        Permission::create(['name' => 'view.activity.logs']);
        Permission::create(['name' => 'export.activity.logs']);
        Permission::create(['name' => 'clear.activity.logs']);

        // Notifications
        Permission::create(['name' => 'receive.notifications.github']);


        /*
        |--------------------------------------------------------------------------
        | Roles
        |--------------------------------------------------------------------------
        */

        // Super Admin
        // Full access is handled by Gate::before and therefore does not require
        // every permission to be explicitly assigned.
        $role = Role::create(['name' => 'Super Admin']);

        // Administrator
        $role = Role::create(['name' => 'Administrator']);
        $role->givePermissionTo([
            // Dashboard
            'access.admin.panel',
            'view.dashboard',

            // Pages
            'view.pages',
            'create.pages',
            'edit.pages',
            'delete.pages',
            'publish.pages',
            'view.unpublished.pages',

            // Blog
            'view.posts',
            'create.posts',
            'edit.posts',
            'delete.posts',
            'publish.posts',
            'view.unpublished.posts',

            // Gallery - Albums
            'view.albums',
            'create.albums',
            'edit.albums',
            'delete.albums',

            // Gallery - Images
            'view.images',
            'upload.images',
            'edit.images',
            'delete.images',
            'move.images',

            // Users
            'view.users',
            'create.users',
            'edit.users',
            'delete.users',
            'ban.users',
            'unban.users',
            'impersonate.users',
            'verify.users',

            // Roles
            'view.roles',
            'create.roles',
            'edit.roles',
            'delete.roles',
            'assign.roles',

            // Permissions
            'view.permissions',
            'edit.permissions',

            // Menus
            'view.menus',
            'create.menus',
            'edit.menus',
            'delete.menus',

            // Settings
            'manage.settings.general',
            'manage.settings.seo',
            'manage.settings.email',
            'manage.settings.social',
            'manage.settings.theme',
            'manage.settings.storage',
            'manage.settings.security',
            'manage.settings.integrations',

            // SEO
            'view.seo',
            'edit.seo',

            // Activity Logs
            'view.activity.logs',
            'export.activity.logs',
            'clear.activity.logs',

            // Notifications
            'receive.notifications.github',
        ]);

        // Editor
        $role = Role::create(['name' => 'Editor']);
        $role->givePermissionTo([
            // Dashboard
            'access.admin.panel',
            'view.dashboard',

            // Pages
            'view.pages',
            'create.pages',
            'edit.pages',
            'delete.pages',
            'publish.pages',
            'view.unpublished.pages',

            // Blog
            'view.posts',
            'create.posts',
            'edit.posts',
            'delete.posts',
            'publish.posts',
            'view.unpublished.posts',

            // Gallery
            'view.albums',
            'create.albums',
            'edit.albums',
            'delete.albums',
            'view.images',
            'upload.images',
            'edit.images',
            'delete.images',
            'move.images',

            // Menus
            'view.menus',
            'edit.menus',

            // SEO
            'view.seo',
            'edit.seo',
        ]);

        // Author
        $role = Role::create(['name' => 'Author']);
        $role->givePermissionTo([
            // Dashboard
            'access.admin.panel',
            'view.dashboard',

            // Blog
            'view.posts',
            'create.posts',
            'edit.posts',
            'delete.posts',
        ]);

        // Contributor
        $role = Role::create(['name' => 'Contributor']);
        $role->givePermissionTo([
            // Dashboard
            'access.admin.panel',
            'view.dashboard',

            // Blog
            'view.posts',
            'create.posts',
            'edit.posts',
        ]);

        // Member
        // Base role for authenticated users with no administrative permissions.
        $role = Role::create(['name' => 'Member']);


        /*
        |--------------------------------------------------------------------------
        | Refresh Permission Cache
        |--------------------------------------------------------------------------
        */

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
