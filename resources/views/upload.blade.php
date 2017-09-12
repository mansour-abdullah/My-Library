@extends('layouts.main')
@section('content')
<div class="row">
<div class="col-md-6 col-md-offset-3">
<div class="panel panel-default">
<div class="panel-heading"><h4>Upload Book </h4></div>
<div class='panel-body'>
@if (count($errors) > 0)
<div class="alert alert-danger">
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
@foreach ($errors->all() as $error)
<p>{{ $error }}</p>
@endforeach

</div>
@endif
<form class="form-horizontal" method="POST" action="/upload_book" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="form-group">
<label class="  col-sm-4" for="email">Book Title:</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="email" placeholder="" name='title'>
</div>
</div>
<div class="form-group">
<label class=" col-sm-4" for="pwd">Author:</label>
<div class="col-sm-8"> 
<input type="text" class="form-control" id="pwd" name='author'>
</div>
</div>
<div class="form-group">

<label for="sel1" class=' col-sm-4'>Category:</label>
<div class="col-sm-8"> 
<select class="form-control" id="sel1" name='category_id'>
@foreach($categories as $category)
<option value="{{$category->id}}">{{$category->name}}</option>
@endforeach
</select>
</div>
</div>
<div class="form-group">
<label for="desc" class=' col-sm-4'>Description:</label>
<div class="col-sm-8"> 
<textarea class="form-control" rows="6" id="desc" cols="10" name='description'></textarea>
</div>
</div>
<div class="form-group">
<label for="book" class=' col-sm-4'>Book (PDF):</label>
<div class="col-sm-8"> 
<input type='file' class="form-control" id='cover' name='book'>
</div>
</div>
<div class="form-group">
<label for="cover" class=' col-sm-4'>Cover:</label>
<div class="col-sm-8"> 
<input type='file' class="form-control" id='cover' name='cover'>
</div>
</div>

<div class="form-group"> 
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" class="btn btn-success">Upload</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection