<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function create(){
        return view('post.create');
    }

    public function store(Request $request){
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:10|unique:posts',
            'description' => 'required|min:30',
            'tags' => 'required'
        ]);
        
        if($validator->fails()){
            return redirect()->route('create.post')->withErrors($validator->errors());
        }else{ 
            $slug = Str::slug($request->title);
            $post = Post::create([
                'user_id' => $user->id,
                'title' => $request->title,
                'slug' => $slug,
                'tags' => $request->tags,
                'description' => $request->description
            ]);
            session()->flash('success', 'Post created successfuly');
            return redirect()->route('profile');
        }
    }


    public function show(Request $request, $slug){
        
        $post = Post::where('slug', $slug)->first();

        $comments = Comment::where('post_id', $post->id)->latest()->get();
        if(!$post){
            return redirect()->route('index');
        }
        $post->views = $post->views + 1 ;
        $post->update();

        $topPosts = Post::where('views', '>=' , 20)->limit(5)->orderBy('views','desc')->get();
        $bestWriters = User::with('post')->limit(6)->get();
        $writers = [];
        
        foreach($bestWriters as $bwriter){
            foreach($bwriter->post as $postt){
                if(!in_array($bwriter->name,$writers)){
                    if($postt->views >= 25){
                        array_push($writers, $bwriter->name);
                    }
                }
            }
        }
        
        $related = Post::inRandomOrder()->take(3)->get();
        $writers = User::whereIn('name', $writers)->get();
        $data['bestWriters'] = $writers;
        $data['related'] = $related;
        $data['topPosts'] = $topPosts;
        $data['post'] = $post;
        $data['comments'] = $comments;
        return view('blogs', $data);
    }

}
