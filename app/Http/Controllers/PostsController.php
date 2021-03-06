<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage; //Why did we add this line?
// use DB -->(to use db library)


class PostsController extends Controller
{
     /**
     * Create a new controller instance: With thes line, anything that ism't authenticated is redirected to the login page
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=> ['index']] );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // For single post :  Post::where('title', 'Post Two')->get()
        // To use DB      :  $posts = DB::select('SELECT * FROM posts');
        // To get all posts:  $posts = Post::all();
        $posts = Post::orderBy('updated_at','desc')->paginate(10);    //   To order posts 
        return view('posts.index')->with('posts', $posts);
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
     * Store a newly created resource in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required',
            'cover_image' => 'image|nullable|max:1999' ]);  // cover_image must be an image. nullable means image upload is optional. maxsize is 1999. if not explicitly stated, apache will give us a default size of 2mb which  is large
            $cover_image = 'cover_image';
            $post = new Post;
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->user_id = auth()->user()->id;
            $post->cover_image = Controller::upload_image($request, $cover_image); 
            $post->save();
            return redirect('/posts')->with('success', 'Post created');
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
        return view('posts.show')->with('post', $post);
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
        return view('posts.edit')->with('post', $post);
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
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required']);
            $cover_image = 'cover_image';
            $post = Post::find($id);
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            if ($request->hasFile($cover_image)) {
                $post->cover_image = Controller::upload_image($request, $cover_image);
            }
            $post->save();
            return redirect('/posts')->with('success', 'Post Updated');
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
        //only user that posted is allowed to delete
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        if ($post->cover_image != 'noImage.jpg') {
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post->delete();
        return redirect('/posts')->with('success', 'Post deleted');
    }
}
