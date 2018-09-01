<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
// This is Eloquent data fetching
use App\Post;
// To use normal query DB libery is required
use DB;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        /*
        One way of eloquent
        $post = Post::all();
        
        $posts = Post::orderBy('created_at','desc')->get();

        take() is used to limit results
        $posts = Post::orderBy('created_at','desc')->take(1)->get();

        To use normal query
        $post = DB::select('SELECT * FROM posts');
        */
        
        // This is paginate to pagination
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title'=>'required',
            'body'=>'required',
            'cover-img'=>'image|nullable|max:1999'
        ]);
        $fileNameToStore = "";
        //handel file
        if($request->hasFile('cover-img')){
            $fielNameWithExt = $request->file('cover-img')->getClientOriginalName();
            $filename = pathinfo($fielNameWithExt,PATHINFO_FILENAME);
            $extName = $request->file('cover-img')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extName;
            $path = $request->file('cover-img')->storeAs('public/cover-img/',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        //handel post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_img = $fileNameToStore;
        $post->save();
        return redirect('/posts')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        // we can get post like this
        //  $post = Post::where('title','Post two')->get();
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        //check for correct user
        if(auth()->user()->id!==$post->user_id){
            return redirect('/posts')->with('error','Unothorized access');
        }
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'body'=>'required',
            'cover-img'=>'image|nullable|max:1999'
        ]);
        $fileNameToStore = "";
        //handel file
        if($request->hasFile('cover-img')){
            $fielNameWithExt = $request->file('cover-img')->getClientOriginalName();
            $filename = pathinfo($fielNameWithExt,PATHINFO_FILENAME);
            $extName = $request->file('cover-img')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extName;
            $path = $request->file('cover-img')->storeAs('public/cover-img/',$fileNameToStore);
        }
        $post = Post::find($id);
        //check for correct user
        if(auth()->user()->id!==$post->user_id){
            return redirect('/posts')->with('error','Unothorized access');
        }
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover-img')){
            $post->cover_img = $fileNameToStore;
        }
        $post->save();
        return redirect('/posts')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        //check for correct user
        if(auth()->user()->id!==$post->user_id){
            return redirect('/posts')->with('error','Unothorized access');
        }
        if($post->cover_img != 'noimage.jpg'){
            Storage::delete('/public/storage/'.$post->cover_img);
        }
        $post->delete();
        return redirect('/posts')->with('success','Post Deleted');
    }
}
