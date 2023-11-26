<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

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
}
