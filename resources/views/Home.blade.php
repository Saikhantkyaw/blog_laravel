@extends('layout')
@section('content')
   <h2 style="text-align:center;"> Blog simple site</h2> <br><br>
      @if (session('alert'))
      <div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> {{session('alert')}}
  </div>
    @endif
   <div class="container"> 
   <a href="posts/create"  class="btn btn-success">new blog</a> <br>
   <h4 style="float:right;">User_name::{{Auth::user()->name}}</h4>
  
    @foreach($post as $post)
    
    <div  class="container" >  
         <div class="card">
        <div class="card-header" style="text-align:center;">
          <h3> {{$post->name}} </h3>
        </div>
        <div class="card-body">
            <h5 class="card-title" style="text-align:center;">{{$post->description}}</h5>
            
            <a href="/posts/{{$post->id}}" class="btn btn-primary">View</a>
             <a href="/posts/{{$post->id}}/edit" class="btn btn-warning" style="float: right;">edit</a><br><br>
             <form action="/posts/{{$post->id}}" method="post">
                @csrf
                @method('DELETE')
                 <button type="submit" class="btn btn-danger">DELETE </button>
             </form>
        </div>
</div>
  <br><br>
    </div>
     
    @endforeach
     <br><a href="logout"  class="btn btn-warning">logout</a> <br>
    </div>
@endsection