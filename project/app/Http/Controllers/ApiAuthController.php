<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3'],
            "role"=>["required"],
            'device_name' => ['required', 'string']
        ]);
        // 1
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        // 2

        $input = $request->all();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=> $request->role,
        ]);
        // 3

       $token = $user->createToken($request->device_name)->plainTextToken;


        return response()->json(['token' => $token], 200);
    }

    public function token(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3'],
            'device_name' => ['required', 'string']
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        // 1

        $user = User::where('email', $request->email)->first();
        // 2

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'The provided credentials are incorrect.'], 401);
        }
        // 3

        return response()->json(['token' => $user->createToken($request->device_name)->plainTextToken]);
        // 4
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->noContent();

    }

}





