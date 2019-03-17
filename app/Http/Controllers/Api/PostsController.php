<?php

namespace App\Http\Controllers\Api;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Requests\post\StorePostRequest;

class PostsController extends Controller
{
    public function index(){
        $posts = Post::paginate(3);
        return PostResource::collection($posts);
    }

    public function show($post)
    {
        $post = Post::findOrFail($post);
        return new PostResource($post);
    }
    
    public function store(StorePostRequest $request)
    {
        Post::create($request->all());

        return response()->json([
            'message' => 'Post Created Successfully'
        ],201);
    }
}
