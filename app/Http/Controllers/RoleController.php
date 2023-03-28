<?php

namespace App\Http\Controllers;

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
        return Role::whereNotIn('name', ['admin'])->get();
    }

    public function show($id)
    {
        // Log::info('$id');
        // dd($id);
        $role = Role::find($id);
        Log::info('$role show');
        Log::info($role);

        $returnedRole = new RoleResource($role);

        $permissions = $role->permissions();

        return response()->json(['returnedRole'=>$returnedRole,'permissions'=>$permissions]);
        // return  with('returnedRole', $role)->with('permissions',$permissions);
        // return new RoleResource($role);
        // return 1;
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
        Log::info('role');
        $role = Role::create($request->validated());
        Log::info($role);
    }

    // public function edit(Role $role)
    // {
    //     $permissions = Permission::all();
    // }

    public function update(Request $request,$id)
    {
        $role = Role::find($id);
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $role->update($validated);
    }

    public function destroy(Role $role)
    {
        Log::info('role controller delete');
        $role->delete();
    }

    public function givePermission(Request $request,  $id)
    {
        $role = Role::find($id);
        Log::info('$request->permission');
        Log::info($request);
        if ($role->hasPermissionTo($request->permission)) {
            return response()->with([
                'message'=>'permission already assigned',
            ]);
        }
        $this->validate($request, [
            'name' => 'required|unique:roles|max:10',
            'permission' => 'required'
          ]);

        foreach($request['permission'] as $permission)
        {
          if($p = Permission::where('id', '=', $permission)->first())
          {
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
