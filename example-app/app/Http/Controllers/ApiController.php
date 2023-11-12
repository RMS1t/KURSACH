<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Validation\Validator;
use Illuminate\View\View;
use mysql_xdevapi\Exception;

class ApiController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $response='index working';

        return response()->json($response, 200);
    }
    public function signup(Request $request)
    {

            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);

            if ($validator->fails()) {

                throw  new Exception( $validator->errors(),403);

            }

            if (User::create($request->all())) {
                $response=[ 'message'=>'Signup successful', ];
                return   response()->json($response, 200);

            }
        throw  new Exception( 'Somebody going bad',500);
    }

    public function logout()
    {

    }
    public function upload()
    {

    }

}
