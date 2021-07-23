<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // public function userView()
    // {
    //     return User::all();
    // }

    public function signupView()
    {
        return User::all();
    }



    public function signUp(Request $request)
    {
        //dd($request);
                $this->validate($request, [
            'name' => 'required|max:36',
            'email' =>'required|unique:users|max:36',
            'password' => 'required|confirmed'
        ]);

         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if(Auth::attempt($request->only('email', 'password'))){

            $resArr = [];
            $resArr['token'] = $user->createToken('api-application')->accessToken;
            $resArr['name'] = $user->name;

            return response()->json($resArr, 200);
        }
        return 'unable to signup';

    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' =>'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))){

        $user = Auth::user();
        $resArr = [];
        $resArr['token'] = $user->createToken('api-application')->accessToken;
        $resArr['name'] = $user->name;

        return response()->json($resArr, 200);
    }
    return 'unauthorized access';
    }


}


