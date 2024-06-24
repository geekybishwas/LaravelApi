<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::get();
        return response()->json([
            'message'=>'List of posts',
            'posts'=>$posts
        ],200); //Set an staus code of 200
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $post=new Post;
        $post->title=$request->title;
        $post->content=$request->content;
        $post->save();

        return response()->json([
            'message'=>'New Post Created !!',
            'post'=>$post,
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json([
            'message'=>'Single Post',
            'post'=>$post,
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // dd($request->all());
        $post->title=$request->title ?? $post->title;
        $post->content=$request->content ?? $post->content;
        $post->save();

        return response()->json([
            'message'=>'Post Updated',
            'post'=>$post
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        return response()->json([
            'message'=>'Post Deleted',
            'post'=>$post->delete()
        ],200);
    }
}
