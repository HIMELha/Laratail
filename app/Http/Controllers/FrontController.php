<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index(){
        $posts = Post::latest()->paginate(10);
        $topPosts = Post::where('views', '>=' , 20)->limit(5)->orderBy('views','desc')->get();
        $bestWriters = User::with('post')->limit(6)->get();
        $writers = [];
        
        foreach($bestWriters as $bwriter){
            foreach($bwriter->post as $post){
                if(!in_array($bwriter->name,$writers)){
                    if($post->views >= 25){
                        array_push($writers, $bwriter->name);
                    }
                }
            }
        }

        $writers = User::whereIn('name', $writers)->get();
        $data['bestWriters'] = $writers;
        $data['posts'] = $posts;
        $data['topPosts'] = $topPosts;
        return view('home', $data);
    }

    public function storeComment(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'comment' => 'required|min:10'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        Comment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $id,
            'comments' => $request->comment
        ]);
        session()->flash('success', 'Comment submitted success');
        return redirect()->back();
    }

}
