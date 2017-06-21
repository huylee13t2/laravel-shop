<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Socialite;

class AuthController extends Controller
{
    public function viewLogin(){
        return view('auth.login');
    }

    public function login(Request $req){
    	$username = $req['username'];
    	$password = $req['password'];

        

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
    }

    public function logout(){
    	Auth::logout();
    	return view('auth.login');
    }

    public function viewRegister(){
        return view('auth.register');
    }

    public function postRegister(Request $request){
        $this->validate($request, 
            ['name'=>'unique:users',], 
            ['name.unique'=>'Name already exists!',]
            );

        $user = new User;

        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;

        $user->save();

        return view('auth.login');
        
    }
}
