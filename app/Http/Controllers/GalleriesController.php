<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class GalleriesController extends Controller
{


     /**
     * Create a new controller instance: With this line, anything that ism't authenticated is redirected to the login page
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=> ['show']] );
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    // check  if this code will work: ---------> user = auth->user(); return $user;  ... I think it will
        $user_id = auth()->user()->id;          
        $user = User::find($user_id);
        $data = array(
            'title' =>'Galleries',
            'response' =>'There are no Galleries yet',
            'posts'=> $user->posts,
            'galleries' => $user->galleries()
        );
        return view('user.gallery.index')->with($data);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.gallery.create');
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
            'title'=>'required',//extra validation needed
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999']);
        $cover_image = 'cover_image';
        $folder = 'posts_folder'; //consider changing name to folderToStore
        $gallery = new Gallery;
        $gallery->title = $request->input('title');
        $gallery->body = $request->input('body');
        $gallery->user_id = auth()->user()->id;
        $gallery->slug = Controller::convertToSlug($gallery->title);
        $gallery->cover_image = Controller::upload_image($request, $cover_image); 
        $gallery->save();
        $data = array('success'=> 'Gallery created',
                    'gallery'=> $gallery);
        return redirect('/user/home')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

  
    public function show($id)
    {
        if (preg_match("/[a-z]/i", $id)) {
            // if it has alphabet, treat as slug
            $gallery = Gallery::where('slug', '=', $id)->first();
            $data = array(
                'gallery'=>$gallery
            );
            return view('user.gallery.show')->with($data);
        }
        // if it has no alphabet, treat as id
        $gallery = Gallery::find($id);
        // $user = auth()->user()
        $data = array(
            'gallery'=>$gallery
        );
        return view('user.gallery.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return view('user.gallery.edit')->with('gallery', $gallery);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    
    public function update(Request $request, $id){
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required',
            ]);
            $cover_image = 'cover_image';
            $folder = 'posts_folder';
            $gallery = Gallery::find($id);
            $gallery->title = $request->input('title');
            $gallery->body = $request->input('body');
            $gallery->slug = Controller::convertToSlug($gallery->title);
            if ($request->hasFile($cover_image)) {
                $gallery->cover_image = Controller::upload_image($request, $cover_image);
            }
            $gallery->save();
            $data = array('success'=> 'Gallery Edited',
                        'gallery'=> $gallery);
            return view('user.gallery.edit')->with($data);
            // return $gallery;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        //only user that posted is allowed to delete
        if (auth()->user()->id !== $gallery->user_id) {
            return redirect('/gallery')->with('error', 'Unauthorized Page');
        }
        if ($gallery->cover_image != 'noImage.jpg') {
            Storage::delete('public/cover_images/'.$gallery->cover_image);
        }
        $deleted_gallery = $gallery;
        $gallery->delete();
        return redirect('/user/home')->with('success', 'Gallery deleted');
    }
}


 // $galleries = Gallery::orderBy('updated_at','desc')->paginate(10);
        // return view('user.gallery.index')->with('galleries',$galleries);