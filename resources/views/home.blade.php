@extends('layouts.main')
 
@section('title', '- Home')

@section('content')
 
<div class="alert alert-success" role="alert">
Welcome! You can visit your library from <a href="/library" class="alert-link">Here</a>
</div>
<img src="{{asset('img/logo.png')}}" alt="">
<img src="{{asset('img/books-2.png')}}" alt="">
@endsection
 