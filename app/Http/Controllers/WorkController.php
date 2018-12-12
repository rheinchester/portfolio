<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use Illuminate\Support\Facades\Storage; 

// PLEASE USE STUFF IN PAGES FOLDER TO TEST THIS MODULE bY CHANGING 'WORKS' IN VIEW() TO 'PAGES



class UserProfileIndex extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $work = Work::orderBy('created_at', 'desc')->paginate(5);
        $data = array(  
            'work' => $work
            );
        return view('works.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('works.create');
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
            'title'=>'required',
            'body'=>'required',
            'cover_image' => 'image|nullable|max:1999' ]);  // cover_image must be an image. nullable means image upload is optional. maxsize is 1999. if not explicitly stated, apache will give us a default size of 2mb which  is large
            $cover_image = 'cover_image';
            $work = new Work;       //instantiation
            $work->title = $request->input('title');
            $work->body = $request->input('body');
            $work->user_id = auth()->user()->id;
            $work->cover_image = Controller::upload_image($request, $cover_image); 
            $work->save();
            return redirect('works.index')->with('success', 'work created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $work = Work::find($id);
        $data = array(  
            'work' => $work
            );
        return view('works.index')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $work = Work::find($id);
        $data = array('work' => $work );
        return view('works.edit')->with($data);
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
            $work = Work::find($id);
            $work->title = $request->input('title');
            $work->body = $request->input('body');
            if ($request->hasFile($cover_image)) {
                $work->cover_image = Controller::upload_image($request, $cover_image);
            }
            $work->save();
            return redirect('works.index')->with('success', 'work Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $work = Work::find($id);
        //only user that owns work is allowed to delete
        if (auth()->user()->id !== $work->user_id) {
            return redirect('pages.index')->with('error', 'Unauthorized Page');
        }
        if ($work->cover_image != 'noImage.jpg') {
            Storage::delete('public/cover_images/'.$work->cover_image);
        }
        $work->delete();
        return redirect('works.index')->with('success', 'Post deleted');
    }
}
