<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\View;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Input;
use Storage;
use Auth;
use User;
use File;
use Redirect;
use Session;
use App\Book;
use App\Category; 
use Hash;


class BookController extends Controller
{

//Get The Library View with user`s books
public function getLibrary(){
$user_id  = Auth::user()->id; 

//get books by user id
$books = Book::all()->where('user_id' ,$user_id);
//check if the user have any book 
if(!$books->count()){
//activate no Book message
Session::flash('no_book' , '');
}
return view('library')->with('books',  $books);
	 
}

//get specifc book view
public function getBook($id){

//get book by book id
$book = Book::find($id);
//get book categries to edit form
$categories = Category::where('id', '!=', $book->category_id)->get();

return view('book')->with('book' , $book)->with('categories' , $categories);

}

//Search functionality
public function search(Request $request){
//get search keyword
$search_word = $request->input('search');
//get books match the keyword and belong to the user
$books = Book::where('title' , 'like' , '%'.$search_word.'%')->where('user_id' , Auth::user()->id)->get();
//check if found book
if ( $books->count() ) {
 $this->msg('These Books match your search' , 'success');
return view('library')->with('books', $books);

}else{
 $this->msg($search_word.' Not found In your library' , 'danger');
return view('library')->with('books', $books); 
}

} 


//getting upload view
public function upload(){
$categories = Category::all();
//retrun the view with all categories to be in the form
return view('upload')->with('categories' , $categories);
}

//upload functionality
public function upload_book(Request $request){

if(!is_dir(Auth::user()->id)){
//make dirctory for user using user id
$user_dir = Storage::makeDirectory(Auth::user()->id);
}


//valdiate the inputs
$this->validate($request, [
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'book' => 'required|mimes:pdf',
            'title' => 'required|max:255' ,
            'description' => 'required' ,
            'author' => 'required|max:50', 

        ]);

 
/*upload cover
* get title of book to rename cover and book uploaded
*/
$title= $request->input('title');
$cover = $request->file('cover');
$book = $request->file('book');


//upload cover using upload_file custome helper function
$cover_name = $this->upload_file($title , $cover );

//upload Book using same method applied to the cover
$book_name = $this->upload_file($title , $book );

//create record for the book in the database
Book::create([
'title' => $title,
'author' => $request->input('author'),
'description' => $request->input('description'),
'category_id' => $request->input('category_id'),
'user_id' => Auth::user()->id,
'cover'=>  $cover_name,
'name'=>  $book_name,
]
); 
//return to libray with success message
$this->msg($title.' Upload successfully' , 'success');
return redirect('/library');
}


//Delete Book
public function deleteBook($id , Request $request){
//get books by user id
$book = Book::find($id);
//delete files from storage
Storage::delete([Auth::user()->id.'/'.$book->name, Auth::user()->id.'/'.$book->cover]);
//Delete success message
$this->msg($book->title .' Deleted successfully' , 'success');
//Delete the book
$book->delete();
//return the view
return redirect()->route('library');

}

//edit book funtionality
public function editBook($id , Request $request){
//get book by user id
$book      = Book::find($id);
$book_file = $request->file('book');
$title 	   = $request->input('title');
$old_book_name = $book->name;
//check if the file input is empty in edit form
if(empty($book_file)){
$new_book_name = $this->rename_file($title , $old_book_name );
}else{
$new_book_name = $this->upload_file($title , $book_file );
}

$this->validate($request, [
        
            'title' => 'required|max:255' ,
            'description' => 'required' ,
            'author' => 'required|max:50', 

   'book' => 'mimes:pdf',
        ]);

//update the recoed in the database
$book->title       =  $title;
$book->author      =  $request->input('author');
$book->description =  $request->input('description');
$book->category_id =  $request->input('category_id');
$book->name = $new_book_name;
$book->save();
//redirect with success message
$this->msg($title.' Updated successfully' , 'success');
return redirect()->back(); 

}

//change book cover
public function change_cover($id  , Request $request){
$book = Book::find($id);
//get book title to rename the new cover
$title = $book->title;
//get the cover
$new_cover = $request->file('cover');
$this->validate($request, [
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',     
        ]);
 
//upload the new cover
$new_cover_name = $this->upload_file($title , $new_cover );
//change the cover name in databse
$book->cover =   $new_cover_name;
$book->save();
//redirect with success message
$this->msg($title.' Cover Changed successfully' , 'success');
return redirect()->back(); 
}



/*******Helper Functions****/


protected function rename_file($title , $old_name)
{
//get old file extension
$ex = substr($old_name, strpos($old_name, ".") + 0); 
//compainig book title with cover extension
$new_file_name = trim($title).'.'.$ex;
// renaming the file
rename('storage/'.Auth::user()->id.'/'.$old_name , 'storage/'.Auth::user()->id.'/'.$title.$ex);
$new_file_name = $title.$ex;
return $new_file_name;
}

protected function upload_file($title , $file )
{
//upload cover
//get cover extension
$ex =  $file->getClientOriginalExtension();
//compainig book title with cover extension
$new_file_name = trim($title).'.'.$ex;
// move uploaded cover to user directory
$file->move('storage/'.Auth::user()->id.'/', $new_file_name);
return $new_file_name;


}

protected function msg($msg , $color){
//set the message in session
Session::flash('msg' , $msg);
//set the color of the alert
Session::flash('alert' , $color);


}
}
