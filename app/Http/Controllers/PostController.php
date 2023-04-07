<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //This is for controlling my posts
    public function blog(){
        $posts = Post::paginate(1);
        return view('pages.posts.blog')->with('posts', $posts);
    }

    public function index(){

        $user = Auth::user();
        $posts = $user->posts;
        return view('pages.posts.index')->with(['posts' => $posts]);
    }

    public function show(string $id){
        $post = Post::find($id);
        if(!$post){
            return response()->json(['messae' => 'Post Not Found!'], 404);
        }

        return view('pages.posts.show')->with('post', $post);
    }

    public function edit(Post $post){

        $this->authorize('update', $post); //check if the user is authorized to edit this post

        return view('pages.posts.edit')->with('post', $post);
    }

    public function update(Request $request, Post $post){
        $this->authorize('update', $post); //check if the user is authorized to edit this post;

        
        if(!$post){
            return response()->json(['message' => 'Post not found'], 404);
        }

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'tags' =>'required'
        ]);
        $post->title = $request->input('title');;
        $post->body = $request->input('body');
        $post->tags = $request->input('tags');

        $post->save();
        return redirect()->route('post.show', $post)->with('success', 'Your post has been successfully updated');
    }
    public function create(){
        return view('pages.posts.create');
    }
    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'tags' =>'required'
        ]);

        $post = new Post;
        $post->title = $request->input('title');
        $post->user_id = Auth::user()->id;
        $post->body = $request->input('body');
        $post->tags = $request->input('tags');

        $post->save();

        return redirect()->route('post.index');
    }
    public function destroy(string $id, Post $post){
        $this->authorize('update', $post);
        $post = Post::findOrFail($id);
        if(!$post){
            return response()->json(['message' => 'Post Not Found!'], 404);
        }

        $post->delete();
        return redirect()->route('post.index')->with('Success', 'The post has been deleted successfully');
    }
}
