<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Kavenegar\KavenegarApi;
use App\User;
use JWTAuth;
use Auth;

class AuthController extends Controller
{

    public function Register(RegisterRequest $request)
    {
        $user = new User($request->all());
        $pass = str_random(8);
        $user->password = Hash::make($pass);
        $user->save();
        $sender = "1000596446";
        $receptor = $user->phone;
        $message = $user->password;
        $api = new KavenegarApi(env('KAVENEGAR_KEY'));
        $api -> Send ( $sender,$receptor,$message);
        return json_encode([
            'result'   => 'success',
            'response' => $user,
            'password' => $pass
        ]);
    }

    public function Login(LoginRequest $request)
    {
        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            return "wrong email or password";

        $user = User::where('email', $request->email)->get()[0];
        $response_array = ['user' => $user->toArray()];
        $token = JWTAuth::fromUser($user, $response_array);
        return json_encode([
            'result' => 'success',
            'token'  => $token
        ]);
    }
}
