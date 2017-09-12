
<style>
input[type="text"], input[type="password"] {
height: 30px !important; 

}

button.btn {
height: 30px !important;

line-height: 0px !important; 

</style>



<nav class="navbar navbar-default">
<div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="/library">The Library</a>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
 
<li><a href="/upload">  <button type='button' class="btn btn-primary">Upload <span class="glyphicon glyphicon-upload"></span></button></a></li>
<li><a href="/account">  <button type='button' class="btn btn-success">Account Settings <i class="fa fa-tachometer" aria-hidden="true"></i></button></a></li>

</ul>

<ul class="nav navbar-nav navbar-right">
 <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{Auth::user()->name}}
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
           <li><a href="{{ url('/logout') }}">  <button type='button' class="btn btn-danger">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></button></a></li>
        </ul>
      </li>
<li>
<form class="navbar-form navbar-right" method="get" action="/search">

<div class="input-group">

<input type="text" class="form-control" placeholder="Search Book By Title" name="search">
<span class="input-group-btn">
<button type="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search"></span></button>
</span>

</div><!-- /input-group -->
</form>
</li>
</ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
