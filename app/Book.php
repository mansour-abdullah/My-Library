<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Book extends Model
{

 


 


	 protected $fillable = [
        'title', 'author', 'description' , 'category_id' , 'user_id' , 'cover', 'name' ,
    ];
protected $hidden = [
        'password', 'remember_token',
    ];





     public function category (){
return $this->belongsTo('App\Category');
}
     public function user (){
 	   return $this->belongsTo('App\User' , 'user_id');
 }
}
