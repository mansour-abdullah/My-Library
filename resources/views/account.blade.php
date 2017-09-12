@extends('layouts.main')
@section('content')
<div class='row'>
<div class="col-md-6 col-md-offset-3">
<div class="panel-group">
<div class="panel panel-default">
<div class="panel-heading"><h3>Login info</h3></div>
<div class="panel-body">
@if (Session::has('success_name'))
<div class="alert alert-success"> <strong>{{ Session::get('success_name') }}</strong>  </div>
@endif
<label for="">Your Email</label>
<input type="email" readonly="" value="{{Auth::user()->email}}" class="form-control">
<label for="">Your Name</label>
<input type="text" readonly="" value="{{Auth::user()->name}}" class="form-control">
<br>
<form action="/change_username" class="form-inline" method="POST">
{{ csrf_field() }}
<div class="form-group">
<label for="">Change Your Name</label>
<input type="text" name='name' class="form-control" placeholder="write your new name ..">
<button type="submit" class="btn btn-sm btn-primary">Change</button></div>
</form> 
</div>
</div>
</div>

<!--if user logged in using socialmedia account
it will not have password so we check if itsnot null we allow him to change old password-->
@if(!is_null(Auth::user()->password))
<div class="panel-group">
<div class="panel panel-default">
<div class="panel-heading"><h3>Change Password</h3></div>
<div class="panel-body">
@if (Session::has('success_password'))
<div class="alert alert-success"> <strong>{{ Session::get('success_password') }}</strong>  </div>
@endif
@if (count($errors) > 0)
<div class="alert alert-danger">
@foreach ($errors->all() as $error)
<p>{{ $error }}</p>
@endforeach
</div>
@endif
<form action="/change_password" class="inline" method="POST">
{{ csrf_field() }}
<div class="form-group">
<label for="">Current Password
<input type="password" name='current_password' class="form-control" ></label>
</div>
<div class="form-group">
<label for="">New Password
<input type="password" name='password' class="form-control" ></label>
</div>
<div class="form-group">
<label for="">Confirm new Password
<input type="password"   class="form-control" name='password_confirmation' ></label>
</div>
<button type="submit" class="btn btn-sm btn-primary">Change</button> 
</form>
@endif

</div>
</div>
</div>
</div>
</div>

@endsection
