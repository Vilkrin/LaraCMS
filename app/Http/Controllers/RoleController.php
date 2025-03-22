<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::latest()->paginate(10); // Orders roles by newest first

        return view('admin.roles.index', compact('roles'));
    }

    public function allRoles() {}

    public function create()
    {

        $role_permission = Permission::select('name', 'id')->distinct()->get();

        $custom_permission = [];

        foreach ($role_permission as $per) {
            $key = strstr($per->name, '.', true) ?: $per->name; // Extracts prefix before "."
            $custom_permission[$key][] = $per;
        }

        return view('admin.roles.create', ['permissions' => $custom_permission]);

        // \DB::statement("SET SQL_MODE=''");;
        // $role_permission = Permission::select('name', 'id')->groupBy('name')->get();

        // $custom_permission = array();

        // foreach ($role_permission as $per) {

        //     $key = substr($per->name, 0, strpos($per->name, "."));

        //     if (str_starts_with($per->name, $key)) {

        //         $custom_permission[$key][] = $per;
        //     }
        // }

        // return view('admin.roles.create')->with('permissions', $custom_permission);
    }

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

    public function edit($id)
    {
        $role = Role::with('permissions')->find($id);

        \DB::statement("SET SQL_MODE=''");
        $role_permission = Permission::select('name', 'id')->groupBy('name')->get();


        $custom_permission = array();

        foreach ($role_permission as $per) {

            $key = substr($per->name, 0, strpos($per->name, "."));

            if (str_starts_with($per->name, $key)) {
                $custom_permission[$key][] = $per;
            }
        }

        return view('admin.roles.edit', compact('role'))->with('permissions', $custom_permission);
    }

    public function update(Request $request, $id) {}

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully.');
    }
}
