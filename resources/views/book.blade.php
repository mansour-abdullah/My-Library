@extends('layouts.main')
@section('content')
<div class="row">
<div class="col-sm-6 col-md-10 col-md-offset-1">
@if (Session::has('msg')) 
<div class="alert alert-{{ Session::get('alert') }}"> <strong>{{ Session::get('msg') }}</strong>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
{{ Session::forget('msg' , 'alert') }}
@endif

<div class="panel panel-default">
<div class="panel-heading">
<h3>{{$book->title}}</h3> 
<span class="label label-success"><strong>Author : </strong> {{$book->author}}</span>
<span class="label label-primary">Category : {{$book->category->name}}</span>

</div>
<div class="panel-body">
@if (count($errors) > 0)
<div class="alert alert-danger">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
@foreach ($errors->all() as $error)
<p>{{ $error }}</p>
@endforeach

</div>
@endif
<div class="row">
<div class="col-md-4 pull-left">

<div class="thumbnail">
<img src="{{ Storage::url(Auth::user()->id.'/'.$book->cover) }} " alt="..." class='  img-responsive  ' style="width:411px; height:411px; ">
<form action="/upload_cover/{{$book->id}}" method="POST" enctype="multipart/form-data" id='upload_form'>
{{ csrf_field() }}
<div class="caption post-content">
<input type="file" class='chooser' id='file' name='cover'>
<a href="#" >Change Cover <span class=""></span></a>
</form>
</div>
</div>

</div>
<div class="col-md-8 pull-right">

<p class="lead text-left">{{$book->description}}</p>

</div>
</div>
</div>
<div class="panel-footer">
<button  class="btn btn-warning" role="button" data-toggle="modal" data-target="#myModal">Edit</button>
<a href="javascript:ConfirmDelete({{$book->id}})"><button  class="btn btn-danger" role="button">Delete</button></a> 
<a href="{{url('book/'.$book->id.'')}}"><button  class="btn btn-success" role="button">Download</button></a> 
</div>	
</div>
</div>
</div>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Edit Book</h4>
</div>
<div class="modal-body">
<form action="edit/{{$book->id}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="form-group">
<label>Title : </label>
<input type="text" id="title" name='title' class="form-control" value="{{$book->title}}">
</div>
<div class="form-group">
<label>Author : </label>
<input type="text"  id='model' name='author' class="form-control" value="{{$book->author}}">
</div>

<div class="form-group">
<label>Description: </label>
<textarea name='description' id='description' class="form-control">{{ $book->description }}</textarea>     
</div>
<div class="form-group">
<label>Category: </label>
<select name="category_id" id="category_id" class="form-control">
<option value="{{$book->category_id}}">{{$book->category->name}}</option>
@foreach($categories as $category)
<option value="{{$category->id}}">{{$category->name}}</option>
@endforeach
</select>    
</div>
<div class="form-group">
<label>Upload New Book (PDF) : </label>
<input type="file"  id='book' name='book' class="form-control" value="{{$book->name}}">
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<input   type="submit" class="btn btn-primary" value="Save changes"> 
</div>
</form>
</div>
</div>
</div>
</div>

@endsection