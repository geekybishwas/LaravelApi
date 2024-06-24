<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
// use app\Http\Controllers\ApiController;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::get();

        // return $this->successResponse($posts,'List of posts');
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
        $post=Post::create($request->validated());
        // $post->create($request->validated());

        return response()->json([
            'message'=>'New Post Created !!',
            'post'=>$post,
        ],200);

        // return $this->successResponse($post,'Post Created');
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

        // return $this->successResponse($post,'Post Show');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Post $post)
    {
        // dd($request->all());
        $post->update($request->validated());

        return response()->json([
            'message'=>'Post Updated',
            'post'=>$post
        ]);
        // return $this->successResponse($post,'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([
            'message'=>'Post deleted',
            'post'=>null
        ]);
        // return $this->successResponse($post,'Post Destroy');
    }
}
