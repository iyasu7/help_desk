<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    // public function register(RegisterRequest $request){
    //     $data = $request->all();
    //     $data['password']= Hash::make($data['password']);

    //     $user = User::create($data);
    //     $token = $user->createToken('main')->plainTextToken;
    //     return ([
    //         'user'=>$user,
    //         'token'=>$token
    //     ]);
    // }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|string|exists:users,email',
            'password' => [
                'required',
            ],
            'remember' => 'boolean'
        ]);
        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);

        if (!Auth::attempt($credentials, $remember)) {
            return response(['error' => 'The provided credentials are not correct'], 422);
        }
        $user = Auth::user();
        $token = $user->createToken('main')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function register(Request $request)
    {

        // $data = $request->validate([
        //     'name'=>'required|string',
        //     'email'=> "required|email|String|unique:user,email",
        //     'password'=>[
        //         'required','confirmed',
        //         Password::min(8)->mixedCase()->numbers()->symbols()
        //     ]
        // ]);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        // Log::info('auth controller');
        $user = User::create($data);
        // Log::info($user);

        // $user= User::create([
        //     'name' =>$data['name],
        //     'email' =>$data['email'],
        //     'password' =>bcrypt($data['password'])
        // ]);
        $token = $user->createToken('main')->plainTextToken;
        return ([
            'user' => $user,
            'token' => $token
        ]);
    }
}
