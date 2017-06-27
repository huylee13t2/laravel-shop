<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Socialite;
use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\ProfileModel;


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

    // redirectTwitter
    public function redirectTwitter()
    {
        return Socialite::driver('twitter')->redirect();   
    }   

    public function callbackTwitter(){
        $providerUser = Socialite::driver('twitter')->user();

        $id = $providerUser->getId();
        $name = $providerUser->getName();
        $email = $providerUser->getEmail();
        $avatar = $providerUser->getAvatar();

        $acount = User::where('name', $id)->first();
        if($acount == null){
            // save account to table `users`

            $user = new User;
            $user->name = $id;
            $user->password = bcrypt($id);
            $user->email = $email;
            $user->save();

            // create account to table `profile`
            $profile = new ProfileModel;
            $profile->full_name = $name;
            $profile->avatar = $avatar;
            $profile->user_id = $user->id;
            $profile->orther = 1;
            $profile->save();

        } 

        // login
        if(Auth::attempt(['name'=>$id, 'password'=>$id]))
            return redirect('/');
        else
            return view('auth.login', ['msg'=>'Login Error!']);
    }

    // github
    public function redirectGithub()
    {
        return Socialite::driver('github')->redirect();   
    }   

    public function callbackGithub(){
        $providerUser = Socialite::driver('github')->user();

        $id = $providerUser->getId();
        $name = $providerUser->getName();
        $email = $providerUser->getEmail();
        $avatar = $providerUser->getAvatar();

        $acount = User::where('name', $id)->orWhere('email', $email)->first();
        if($acount == null){
            // save account to table `users`

            $user = new User;
            $user->name = $id;
            $user->password = bcrypt($id);
            $user->email = $email;
            $user->save();

            // create account to table `profile`
            $profile = new ProfileModel;
            $profile->full_name = $name;
            $profile->avatar = $avatar;
            $profile->user_id = $user->id;
            $profile->orther = 1;
            $profile->save();

        } 

        // login
        if(Auth::attempt(['name'=>$id, 'password'=>$id]))
            return redirect('/');
        else
            return view('auth.login', ['msg'=>'Login Error!']);
    }

    // google
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();   
    }   

    public function callbackGoogle(){
        $providerUser = Socialite::driver('google')->user();
        $id = $providerUser->getId();
        $name = $providerUser->getName();
        $email = $providerUser->getEmail();
        $avatar = $providerUser->getAvatar();

        $acount = User::where('name', $id)->orWhere('email', $email)->first();
        if($acount == null){
            // save account to table `users`

            $user = new User;
            $user->name = $id;
            $user->password = bcrypt($id);
            $user->email = $email;
            $user->save();

            // create account to table `profile`
            $profile = new ProfileModel;
            $profile->full_name = $name;
            $profile->avatar = $avatar;
            $profile->user_id = $user->id;
            $profile->orther = 1;
            $profile->save();

        } 

        // login
        if(Auth::attempt(['name'=>$id, 'password'=>$id]))
            return redirect('/');
        else
            return view('auth.login', ['msg'=>'Login Error!']);
        
    }

    // facebook
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();   
    }   

    public function callback()
    {
        // when facebook call us a with token   
        $providerUser = \Socialite::driver('facebook')->user();
        $id = $providerUser->getId();
        $getNickname = $providerUser->getNickname();
        $name = $providerUser->getName();
        $email = $providerUser->getEmail();
        $avatar = $providerUser->getAvatar();
        echo $id.'<hr>';
        echo $getNickname.'<hr>';
        echo $name.'<hr>';
        echo $email.'<hr>';
        echo $avatar.'<hr>';
        // dd($providerUser);

        $acount = User::where('name', $id)->orWhere('email', $email)->first();
        // dd($acount);
        if($acount == null){
            // save account to table `users`

            $user = new User;
            $user->name = $id;
            $user->password = bcrypt($id);
            $user->email = $email;
            $user->save();

            // create account to table `profile`
            $profile = new ProfileModel;
            $profile->full_name = $name;
            if($providerUser->user['gender'] == 'male'){
                $profile->gender =  1;
            } else{
                $profile->gender =  0;
            }
            $profile->avatar = $avatar;
            $profile->user_id = $user->id;
            $profile->orther = 1;
            $profile->admin = 0;
            $profile->save();

        } 

        // login
        if(Auth::attempt(['name'=>$id, 'password'=>$id]))
            return redirect('/');
        else
            return view('auth.login', ['msg'=>'Login Error!']);

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
