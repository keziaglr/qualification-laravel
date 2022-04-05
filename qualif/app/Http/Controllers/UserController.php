<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function showRegisterForm()
    {
        return view('register');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function register(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|unique:App\Models\User',
            'password' => 'required|alpha_dash|min:5',
            'gender' => 'required',
            'address' => 'required|min:10'
        ]);

        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
            'address' => $request->address,
            'role' => 'user'
        ]);

        return redirect()->back()->with('message', 'Registration Successful!');
    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        if(auth()->attempt(['email'=>$email, 'password' => $password])){
            return redirect('home');
        }else{
            return redirect()->back()->with('message', 'You have entered an invalid username or password');
        }

    }

    public function logout(Request $request){
        auth()->logout();
        return redirect('/login');
    }

}
