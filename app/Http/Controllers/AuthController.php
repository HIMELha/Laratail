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

    public function profile(){
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)->with('user')->latest()->paginate(8);
        $data['posts'] = $posts;
        return view('profile', $data);
    }
}

