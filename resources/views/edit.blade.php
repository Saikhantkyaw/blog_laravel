@extends('layout')
@section('content')
   <h2 style="text-align:center;"> Blog simple site</h2> <br><br>
   @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   <form method="POST" action="/posts/{{$post->id}}">
    @method('PUT')
    @csrf

  <div class="form-group" >

    <label for="name">Name</label>
  <input type="text" class="form-control"  placeholder="Your name" name="name" 
  value="{{old('name',$post->name)}}">
  </div>
  <div class="form-group">
    <label for="description">description</label>
     <textarea name="description" id="" cols="30" rows="10" class="form-control">
      {{old('description',$post->description)}}
    </textarea>
  </div><br>
  <div class="form-group">
 <select class="form-control" name="category_id">
  <option>Category</option>
  @foreach($cat as $cat)
   <option value="{{$cat->id}}"{{$cat->id == $post->category_id ? 'selected' : ''}}>{{$cat->name}}</option>
   @endforeach
 </select>
 </div><br>
  <button type="submit" class="btn btn-warning">Submit</button>
  <a href="/posts" class="btn btn-success">back</a>
</form>
@endsection