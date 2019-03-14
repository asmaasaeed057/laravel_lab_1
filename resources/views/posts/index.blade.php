
@extends('layouts.app')

@section('content')
 <a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a> 
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>     
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Creator Name</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>

  <tbody>
    @foreach($posts as $post)
    <tr>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->description}}</td>
        <td>{{ isset($post->user) ? $post->user->name : 'Not Found'}}</td>
        <td>{{$post->created_at}}</td>

        <td><a href="/posts/{{$post->id}}/show" class="btn btn-success">Show</a></td>
        {{-- <td><a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit</a>  --}}

          <td>
          <a href="{{route('posts.edit',$post->id)}}">Edit </a>
          </td> 


        <td>
            <form action="{{route('posts.destroy',$post->id)}}" method="POST">
              @csrf
              @method('delete')
            {{-- <a  href="/posts/{{$post->id}}/destroy" class="btn btn-danger">Delete</a>  --}}

            <button type="submit" class="btn btn-danger" onclick="return myFunction();">delete</button>
            <script>
                function myFunction() {
                    if(!confirm("Are You Sure to delete this"))
                    event.preventDefault();
                }
              </script>
            </form> 
        </td>
    </tr>
    @endforeach

  </tbody>
</table>
@endsection
