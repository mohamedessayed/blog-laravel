<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //

    function login(Request $request) : object {
        $validation = Validator::make($request->all(),[
            "email"=>'required|email:rfc,dns',
            "password"=>'required|string|min:8'
        ]);

        if ($validation->fails()) {
            # code...
            return response()->json(['status'=>false,'messages'=>$validation->errors()]);
        }

        $user = User::where('email','=',$request->email)->first();


        if ($user) {
            # code...
            if (Hash::check($request->password,$user->password)) {
                # code...
                $token = $user->createToken('Larvel Graunt Access Token');

                return response()->json(['status'=>true,'token'=>$token->accessToken]);
            }
        }


        return response()->json(['status'=>false,'messages'=>"Email or password are not match"]);
    }
}
