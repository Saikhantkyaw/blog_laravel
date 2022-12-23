@extends('layout')
@section('content')
   <h2 style="text-align:center;"> Blog simple site</h2> <br><br>
   
   <div class="container"> 
   <a href="posts/create"  class="btn btn-success">new blog</a> <br>
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
    </div>
@endsection