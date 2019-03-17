<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Http\Requests\post\StorePostRequest;
use App\Http\Requests\post\UpdatePostRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;


class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);
        return view('posts.index', ['posts' => $posts]);
     
    }

    public function create(){
        return view('posts.create',[
            'users' => User::all()
        ]);
    }

    public function store(StorePostRequest $request)
    {
        
        Post::create($request->all());
        return redirect()->route('posts.index');
    }


    public function show(Post $post)
    {
      
        return view('posts.show', [
            'post' => $post,
           
        ]);
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

  
    public function destroy(Post $post){
        
        $post->delete();

        return redirect()->route('posts.index');

  }

  public function update(UpdatePostRequest $request,Post $post){
        $post->update($request->all());
        return redirect()->route('posts.index');
  }
}
