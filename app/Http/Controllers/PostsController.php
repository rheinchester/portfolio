<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
// use DB //(to use db library)


class PostsController extends Controller
{
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            // cover_image must be an image.
            // nullable means image upload is optional.
            // maxsize is 1999. if not explicitly stated,
            // apache will give us a default size of 2mb which  is large
            'title'=>'required',
            'body'=>'required',
            'cover_image' => 'image|nullable|max:1999' ]);  

            // Handle file upload
            if ($request->hasFile('cover_image')) {
                // Get file name with extension
                $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
                // Get just file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get just extension
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                // filename to store
                $fileNameToStore = $fileName.'_'.time().'.'.$extension;
                // upload image
                $path =  $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

            } else {
                $fileNameToStore = 'noimage.jpg';
            }
            
            $post = new Post;
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->user_id = auth()->user()->id;
            $post->cover_image = $fileNameToStore;
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
        
            $post = Post::find($id);
            $post->title = $request->input('title');
            $post->body = $request->input('body');
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
        $post->delete();
        return redirect('/posts')->with('success', 'Post deleted');
    }
}
