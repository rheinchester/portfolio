<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use Illuminate\Support\Facades\Storage;
class GalleriesController extends Controller
{


     /**
     * Create a new controller instance: With this line, anything that ism't authenticated is redirected to the login page
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::orderBy('updated_at','desc')->paginate(10);
        return view('gallery.index')->with('galleries',$galleries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //Good except that we are not able to recieve data on the index
    {
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999']);
            $cover_image = 'cover_image';
            $gallery = new Gallery;
            $gallery->title = $request->input('title');
            $gallery->body = $request->input('body');
            $gallery->user_id = auth()->user()->id;
            $gallery->cover_image = Controller::upload_image($request, $cover_image); 
            $gallery->save();
            return $gallery;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = Gallery::find($id);
        return view('gallery.show')->with('gallery', $gallery);
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
        return view('gallery.edit')->with('gallery', $gallery);
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
            $gallery = Gallery::find($id);
            $gallery->title = $request->input('title');
            $gallery->body = $request->input('body');
            if ($request->hasFile($cover_image)) {
                $gallery->cover_image = Controller::upload_image($request, $cover_image);
            }
            $gallery->save();
            $data = array('success'=> 'Gallery created',
                        'gallery'=> $gallery);
            return $gallery;
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
        $gallery->delete();
        return redirect('/gallery')->with('success', 'Gallery deleted');
    }
}
