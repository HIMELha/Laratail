<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request){

        return view('register');
    }

    public function SaveRegister(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'email|email:actve|unique:users',
            'password' => 'required|min:6',
            'cpassword' => 'required|same:password|min:6'
        ]);

        if($validator->fails()){
            return redirect()->route('register')->withErrors($validator->errors())->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            session()->flash('success', 'Account created successfully');
            return redirect()->route('profile');
        }else{
            session()->flash('error', 'Something went wrong , Please try again');
            return redirect()->route('register');
        }
    }

    public function login(){
        return view('login');
    }

    public function verifyLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if($validator->fails()){
            return redirect()->route('login')->withErrors($validator->errors());
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password ])){
            return redirect()->route('profile');
        }else{
            session()->flash('wrongInfo', 'Invalid email or password');
            return redirect()->route('login');
        }
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }

}

