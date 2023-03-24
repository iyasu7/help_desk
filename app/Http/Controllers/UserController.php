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
        // $users = User::all();
        Log::info('user index');
        Log::info(User::all());
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
        $user = User::create($data)->assignRole($data['role']);

        return ([
            'user' => $user,
        ]);
    }
    // public function assignRole(Request $request, User $user)
    // {
    //     if ($user->hasRole($request->role)) {
    //         return response([
    //             'message' => 'Role exists.'
    //         ]);
    //         // return back()->with('message', 'Role exists.');
    //     }

    //     $user->assignRole($request->role);
    //     return response([
    //         'message' => 'Role assigned.'
    //     ]);
    //     // return back()->with('message', 'Role assigned.');
    // }

    // public function removeRole(User $user, Role $role)
    // {
    //     if ($user->hasRole($role)) {
    //         $user->removeRole($role);
    //         return response([
    //             'message' => 'Role removed.'
    //         ]);
    //         // return back()->with('message', 'Role removed.');
    //     }
    //     return response([
    //         'message' => 'Role not exists.'
    //     ]);
    //     // return back()->with('message', 'Role not exists.');
    // }

    // public function givePermission(Request $request, User $user)
    // {
    //     if ($user->hasPermissionTo($request->permission)) {
    //         return response([
    //             'message' => 'Permission exists.'
    //         ]);
    //         // return back()->with('message', 'Permission exists.');
    //     }
    //     $user->givePermissionTo($request->permission);
    //     return response([
    //         'message' => 'Permission added.'
    //     ]);
    //     // return back()->with('message', 'Permission added.');
    // }

    // public function revokePermission(User $user, Permission $permission)
    // {
    //     if ($user->hasPermissionTo($permission)) {
    //         $user->revokePermissionTo($permission);
    //         return response([
    //             'message' => 'Permission revoked.'
    //         ]);
    //         // return back()->with('message', 'Permission revoked.');
    //     }
    //     return response([
    //         'message' => 'Permission does not exists.'
    //     ]);
    //     // return back()->with('message', 'Permission does not exists.');
    // }

    public function destroy(User $user)
    {
        if ($user->hasRole('admin')) {
            return response([
                'message' => 'you are admin.'
            ]);
            // return back()->with('message', 'you are admin.');
        }
        $user->delete();
        return response([
            'message' => 'User deleted.'
        ]);
        // return back()->with('message', 'User deleted.');
    }
}
