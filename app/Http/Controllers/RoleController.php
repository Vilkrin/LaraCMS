<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::latest()->paginate(10); // Orders roles by newest first

        return view('admin.roles.index', compact('roles'));
    }

    public function allRoles() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role_permission = Permission::select('name', 'id')->distinct()->get();

        $custom_permission = [];

        foreach ($role_permission as $per) {
            $key = strstr($per->name, '.', true) ?: $per->name; // Extracts prefix before "."
            $custom_permission[$key][] = $per;
        }

        return view('admin.roles.create', ['permissions' => $custom_permission]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
        ]);

        $role = Role::create([
            'name' => $request->name,
        ]);

        if ($request->permissions) {

            foreach ($request->permissions as $key => $value) {
                $role->givePermissionTo($value);
            }
        }

        return redirect()->route('roles.all');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $role->load('permissions');

        $permissions = Permission::select(['name', 'id'])
            ->when(config('database.default') === 'sqlite', function ($query) {
                return $query->selectRaw('name, MIN(id) as id');
            })
            ->groupBy('name')
            ->get();

        $groupedPermissions = $permissions->groupBy(function ($permission) {
            return strstr($permission->name, '.', true) ?: $permission->name;
        });

        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => $groupedPermissions
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $role = Role::where('id', $id)->first();

        $request->validate([
            'name' => 'required'
        ]);

        $role->update([
            "name" => $request->name
        ]);

        $role->syncPermissions($request->permissions);


        return redirect()->route('admin.roles.all')->with('success', 'Roles Updated Successfully');
    }

    public function delete($id)
    {
        $role = Role::where('id', $id)->first();

        if (isset($role)) {

            $role->permissions()->detach();
            $role->delete();

            return redirect()->route('roles.all')->with('success', 'Roles Deleted Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully.');
    }
}
