<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\RoleResource;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();
        Log::info($roles);
        return response()->json($roles);
        // return Role::whereNotIn('name', ['admin'])->get();
    }

    public function show($id)
    {
        $role = Role::with('permissions')->findOrFail($id);

        // $permissions = $role->permissions();
        Log::info('role');
        Log::info($role);

        // $returnedRole = new RoleResource($role);

        return response()->json($role);
        // return response()->json(['returnedRole'=>$returnedRole,'permissions'=>$permissions]);
    }

    // public function edit(Role $role)
    // {
    //     // Log::info('$role->name');
    //     // Log::info($role->name);
    //     $permissions = Permission::all();
    //     return compact($role, $permissions);

    //     // return $role;

    // }

    public function assigned(Role $role)
    {
        Log::info($role);
        $permissions = $role->permissions;

        $returnedRole = new RoleResource($role);

        return compact($returnedRole, $permissions);
    }

    public function store(RoleRequest $request)
    {
        // $validated = $request->validate(['name' => ['required', 'min:3']]);
        // $role = Role
        $validated = $request->validated();
        $role = Role::create(['name' => $validated['name'], 'description' => $validated['description']]);
    }

    // public function edit(Role $role)
    // {
    //     $permissions = Permission::all();
    // }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $role->update($validated);
    }

    public function destroy($id)
    {
        Log::info('role controller delete');
        $role = Role::find($id);
        $role->delete();
    }

    public function givePermission(Request $request,  $id)
    {
        $role = Role::find($id);
        Log::info('$request->permission');
        Log::info($request);
        if ($role->hasPermissionTo($request->permission)) {
            return response()->with([
                'message' => 'permission already assigned',
            ]);
        }
        $this->validate($request, [
            'name' => 'required|unique:roles|max:10',
            'permission' => 'required'
        ]);

        foreach ($request['permission'] as $permission) {
            if ($p = Permission::where('id', '=', $permission)->first()) {
                $role->givePermissionTo($p);
            }
        }
        // $role->givePermissionTo($request->permission);
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
        }
        return with('message', 'Permission not exists.');
    }
}
