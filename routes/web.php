<?php
use Illuminate\Http\Request;
use App\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return "Hello laravel";
});
Route::get('/about',function(){
    return view('pages.about');
});
Route::get('/user/{id}/{name}',function($id,$name){
    return 'This is user '.$name.' with id '.$id;
});
*/
Route::get('/','PageController@index');
Route::get('/about','PageController@about');
Route::get('/services','PageController@services');
/*
Route::post('/posts/store',function(Request $request){
    $request->validate([
        'title'=>'required',
        'body'=>'required'
    ]);
    $post = new Post;
    $post->title = $request->input('title');
    $post->body = $request->input('body');
    $post->save();
    return redirect('/posts')->with('success','Post Created');
});
*/
Route::resource('posts','PostsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
