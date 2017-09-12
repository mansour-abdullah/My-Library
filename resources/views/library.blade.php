 @extends('layouts.main')
@section('content')

<div class="row">
<img src="{{asset('img/books.png')}}" alt="">
<h1 class='left'>My Books</h1>
<hr>

@if (Session::has('msg')) 
   <div class="alert alert-{{ Session::get('alert') }}"> <strong>{{ Session::get('msg') }}</strong>
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   </div>
 {{ Session::forget('msg' , 'alert') }}
@endif

@if (Session::has('no_book'))
  <div class="jumbotron" >
<div>
  <p style="color:black">
    You Didn`t Upload any book <br>
    You Can Upload Books From <a href="/upload"> Here</a>
  </p>


</div>

@endif


 
 

@foreach($books as $book)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
    
      <img src="{{Storage::url(Auth::user()->id.'/'.$book->cover) }}" alt="..." class='img-responsive' style="width:311px; height:311px; ">
      <div class="caption">
        <h3>{{$book->title}}</h3>
     
        <a href="{{url('book/'.$book->id.'')}}" class="btn btn-primary" role="button">Details</a>
        <a href="{{Storage::url(Auth::user()->id.'/'.$book->name)}}" class="btn btn-success" role="button" target="_blank">Download</a></p>
      </div>
    </div>
  </div>

  @endforeach
 
</div>

@endsection