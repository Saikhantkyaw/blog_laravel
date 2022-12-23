@extends('layout')
@section('content')
   <h2 style="text-align:center;"> Blog simple site</h2> <br><br>
   
   <div class="container" style="text-align:center;"> 
  
    
     <div class="card">
        <div class="card-header" style="text-align:center;">
          <h3> {{$post->name}} </h3>
        </div>
        <div class="card-body">
            <h5 class="card-title" style="text-align:center;">{{$post->description}}</h5>
            
            <a href="/posts" class="btn btn-primary">Back</a>
        </div>
</div>
     
   
    </div>
@endsection