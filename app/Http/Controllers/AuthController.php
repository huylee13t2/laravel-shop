<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Socialite;
// use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\Http\Requests;



class AuthController extends Controller
{
    public function viewLogin(){
        return view('auth.login');
    }

    public function login(Request $req){
        $username = $req['username'];
        $password = $req['password'];

        var_dump($username);

        // login
        if(Auth::attempt(['name'=>$username, 'password'=>$password]))
            return redirect('/');
        else
            return view('auth.login', ['msg'=>'Login Error!']);
    }


    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();   
    }   

    public function callback()
    {
        // when facebook call us a with token   
        $providerUser = \Socialite::driver('facebook')->user();
        dd($providerUser);
    }

    public function logout(){
        Auth::logout();
        return view('auth.login');
    }

}
