<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function profile(){
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)->with('user')->latest()->paginate(8);
        $followers = Follower::where('writer_id' , $user->id)->get();
        $data['posts'] = $posts;
        $data['followers'] = $followers;
        return view('profile', $data);
    }

    public function profileEdit(){
        return view('editprofile');
    }

    public function update(Request $request){
        $user = Auth::user();
        $userUpdate = User::find($user->id);
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
            'bio' => 'max:255',
            'location' => 'required|max:120',
            'work' => 'required|max:100'
        ]);  

        if($validator->passes()){

            $userUpdate->name = $request->name;
            $userUpdate->email = $request->email;
            $userUpdate->password = $request->password ? Hash::make($request->password) : $userUpdate->password ;
            $userUpdate->bio = $request->bio;
            $userUpdate->lives = $request->location;
            $userUpdate->works = $request->work;
            $userUpdate->save();
            
            session()->flash('success', 'Profile updated successfully');
            return redirect()->route('profile');
        }else{
            return redirect()->route('profile.edit')->withErrors($validator->errors());
        }
    }
}
