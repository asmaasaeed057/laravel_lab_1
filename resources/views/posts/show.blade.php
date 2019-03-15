

@extends('layouts.app')

@section('content')
<a href="{{route('posts.index')}}" class="btn btn-danger">Back</a>

   
       <h1>Post info</h1>

       <h2>Title</h2>
       <h3>{{$post->title}}</h3>
     

       <h2>Description</h2>
       <h3>{{$post->description}}</h3>
       

        <br>
        <br>
       <h1>Post creator info</h1>

       <h2>name</h2>
       <h3>{{$post->user->name}}</h3>
     

       <h2>email</h2>
       <h3>{{$post->user->email}}</h3>

       <h2>created at</h2>
       <h3>{{$post->created_at->format('l js \of F Y h:i:s A')}}</h3>
       
@endsection
