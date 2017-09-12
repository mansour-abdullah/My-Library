@extends('layouts.main')
@section('title', '- Welcome')



@section('content')

<style>
body{
background: url(/img/lib.jpg) left top repeat;
}

input[type="text"], 
input[type="password"], 
textarea, 
textarea.form-control {
height: 50px;
margin: 0;
padding: 0 20px;
vertical-align: middle;
background: #f8f8f8;
border: 3px solid #ddd;
font-family: 'Roboto', sans-serif;
font-size: 16px;
font-weight: 300;
line-height: 50px;
color: #888;
-moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px;
-moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;
-o-transition: all .3s; -moz-transition: all .3s; -webkit-transition: all .3s; -ms-transition: all .3s; transition: all .3s;
}

textarea, 
textarea.form-control {
padding-top: 10px;
padding-bottom: 10px;
line-height: 30px;
}

input[type="text"]:focus, 
input[type="password"]:focus, 
textarea:focus, 
textarea.form-control:focus {
outline: 0;
background: #fff;
border: 3px solid #ccc;
-moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;
}

input[type="text"]:-moz-placeholder, input[type="password"]:-moz-placeholder, 
textarea:-moz-placeholder, textarea.form-control:-moz-placeholder { color: #888; }

input[type="text"]:-ms-input-placeholder, input[type="password"]:-ms-input-placeholder, 
textarea:-ms-input-placeholder, textarea.form-control:-ms-input-placeholder { color: #888; }

input[type="text"]::-webkit-input-placeholder, input[type="password"]::-webkit-input-placeholder, 
textarea::-webkit-input-placeholder, textarea.form-control::-webkit-input-placeholder { color: #888; }



button.btn {
height: 50px;
margin: 0;
padding: 0 20px;
vertical-align: middle;
background: #19b9e7;
border: 0;
font-family: 'Roboto', sans-serif;
font-size: 16px;
font-weight: 300;
line-height: 50px;
color: #fff;
-moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px;
text-shadow: none;
-moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;
-o-transition: all .3s; -moz-transition: all .3s; -webkit-transition: all .3s; -ms-transition: all .3s; transition: all .3s;
}

button.btn:hover { opacity: 0.6; color: #fff; }

button.btn:active { outline: 0; opacity: 0.6; color: #fff; -moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none; }

button.btn:focus { outline: 0; opacity: 0.6; background: #19b9e7; color: #fff; }

button.btn:active:focus, button.btn.active:focus { outline: 0; opacity: 0.6; background: #19b9e7; color: #fff; }

</style>


<!-- Top content -->
<div class="top-content">

<div class="inner-bg">
<div class="container">

<div class="row">
<div class="col-sm-8 col-sm-offset-2 text">
<h1><img src="{{asset('img/logo.png')}}" alt="" style="margin-top:50px;"></h1>
<div class="description">
<p>

</p>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-5">

<div class="form-box">
<div class="form-top">
<div class="form-top-left">
<h3>Login to your library</h3>
<p>Enter Email and password to log on:</p>
</div>
<div class="form-top-right">
<i class="fa fa-key"></i>
</div>
</div>


<!---Login Form-->
<div class="form-bottom">
<form role="form"  method="POST" class="login-form" action="{{ url('/login') }}">
{{ csrf_field() }}
<div class="form-group">
@if ($errors->login->has('email'))
<span class="help-block">
<strong>{{ $errors->login->first('email') }}</strong>
</span>
@endif
<label class="sr-only" for="email">Email</label>
<input type="text" name="email" placeholder="email..." class="form-username form-control" id="form-email" value="">

</div>
<div class="form-group">
<label class="sr-only" for="form-password">Password</label>
<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
@if ($errors->login->has('password'))
<span class="help-block">
<strong>{{ $errors->login->first('password') }}</strong>
</span>
@endif
</div>
<label>
<input type="checkbox" name="remember"> Remember Me
</label>
<a class="btn btn-link" href="/password/reset">Forgot Your Password?</a>
<button type="submit" class="btn">Sign in!</button>
</form>
</div>
</div>

<div class="social-login">
<h3>...or login with:</h3>
<div class="social-login-buttons">
<a class="btn btn-link-1 btn-link-1-facebook" href="/auth/facebook">
<i class="fa fa-facebook"></i> Facebook
</a>

<a class="btn btn-link-1 btn-link-1-google-plus" href="/auth/google">
<i class="fa fa-google-plus"></i> Google Plus
</a>
</div>
</div>

</div>

<div class="col-sm-1 middle-border"></div>
<div class="col-sm-1"></div>

<div class="col-sm-5">

<div class="form-box">
<div class="form-top">
<div class="form-top-left">



<!---Register form-->
<h3>Sign up now</h3>
<p>Create your own library</p>
</div>
<div class="form-top-right">
<i class="fa fa-pencil"></i>
</div>
</div>
<div class="form-bottom">
<form role="form" method="POST" class="registration-form" action="{{ url('/register') }}">
{{ csrf_field() }}
<div class="form-group">
   @if ($errors->has('email'))
<span class="help-block">
<strong>{{ $errors->first('email') }}</strong>
</span>
@endif
<label class="sr-only" for="name">Email</label>
<input type="text" name="email" placeholder="Email..." class="form-last-name form-control" id="form-last-name">
</div>

<div class="form-group">
<label class="sr-only" for="name">Name</label>
<input type="text" name="name" placeholder="Name..." class="form-last-name form-control" id="form-last-name">

</div>
<div class="form-group">
<label class="sr-only" for="password">Password</label>
@if ($errors->has('password'))
<span class="help-block">
<strong>{{ $errors->first('password') }}</strong>
</span>
@endif
<input type="password" name="password" placeholder="Password" class="form-email form-control" id="form-email">
</div>
<div class="form-group">
<label class="sr-only" for="password-confirm">Confirm Password</label>
@if ($errors->has('password_confirmation'))
<span class="help-block">
<strong>{{ $errors->first('password_confirmation') }}</strong>
</span>
@endif
<input type="password" name="password_confirmation" required  placeholder="Confirm Password" class="form-email form-control" id="password-confirm">
</div>


<button type="submit" class="btn">Sign me up!</button>
</form>
</div>
</div>

</div>
</div>

</div>
</div>

</div>

<!-- Footer -->
<footer>
<div class="container">
<div class="row">

<div class="col-sm-8 col-sm-offset-2">
<div class="footer-border"></div>

</div>

</div>
</div>
</footer>


<!--[if lt IE 10]>
<script src="assets/js/placeholder.js"></script>
<![endif]-->


@endsection