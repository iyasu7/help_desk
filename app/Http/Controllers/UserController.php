<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $result = [];
        $result = array();
        foreach ($users as $user) {
            // array_push($result,$user->getRoleNames());
            $user->getRoleNames();
            // $result->array_push
            $role = $user->getRoleNames();
            Log::info($role);
        }
        Log::info('roles');
        // Log::info($result);
        return UserResource::collection(User::all());
    }

    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return compact('user', 'roles', 'permissions');
    }
    public function store(RegisterRequest $request)
    {
        $request['email_verified_at'] = now();
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        // $data.push('email_verified_at'] = now();
        $data['email_verified_at'] = now();
        $roleId = $data['role'];
        $roleName = Role::find($roleId);
        $user = User::create($data)->assignRole($roleName->name);

        return ([
            'user' => $user,
        ]);
    }
    public function roleUsers()
    {
        Log::info('user agents');
        Log::info(User::all()->where('role',3));
        return User::all()->where('role',3);
    }
    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            return response([
                'message' => 'Role exists.'
            ]);
        }

        $user->assignRole($request->role);
        return response([
            'message' => 'Role assigned.'
        ]);
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return response([
                'message' => 'Role removed.'
            ]);
        }
        return response([
            'message' => 'Role not exists.'
        ]);
    }

    public function givePermission(Request $request, User $user)
    {
        if ($user->hasPermissionTo($request->permission)) {
            return response([
                'message' => 'Permission exists.'
            ]);
        }
        $user->givePermissionTo($request->permission);
        return response([
            'message' => 'Permission added.'
        ]);
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return response([
                'message' => 'Permission revoked.'
            ]);
        }
        return response([
            'message' => 'Permission does not exists.'
        ]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->hasRole('admin')) {
            return response([
                'message' => 'you are admin.'
            ]);
        }
        $user->delete();
        return response([
            'message' => 'User deleted.'
        ]);
    }
}
