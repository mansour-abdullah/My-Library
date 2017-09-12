<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Validator;


class AccountController extends Controller
{

public function change_username(Request $request ){

$new_name = $request->input('name');
$user = User::find(Auth::user()->id);
$user->name = $new_name;
$user->save();
return redirect('/account')->with('success_name', 'name changed successfully');


}

public function change_password(Request $request ){
$user = User::find(Auth::user()->id);
$password = $request->input('current_password');
$new_password = $request->input('password');
$credentials = [
'email' => $user->email,
'password' => $password,
];

if(Auth::validate($credentials)) {
// TODO: Old password is correct, do your thing
// Change password and login, OR
// Send them to the login page

$validation = Validator::make($request->all(), [

// Here's how our new validation rule is used.
'password' => 'required|confirmed'
]);

if ($validation->fails()) {
  //redirect back with error msg
return redirect()->back()->withErrors($validation->errors());
}
//hash the new password
$new_password =  Hash::make($new_password);
$user->password = $new_password;
$user->save(); 
return redirect()->back()->with('success_password', 'Password changed successfully');


}
else{
  //return error message if old password is incorrect
return redirect()->back()->withErrors('Incorrect old password');
}


}
}
