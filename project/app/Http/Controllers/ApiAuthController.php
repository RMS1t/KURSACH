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
            'role'=>['required']
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

       $token = $user->createToken(rand())->plainTextToken;


        return response()->json(['token' => $token]);
    }

    public function token(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string'],
            'password' => ['required', 'string', 'min:3'],
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

        return response()->json(['token' => $user->createToken(rand())->plainTextToken], "role"=>$user->role);
        // 4
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->noContent();

    }

}





