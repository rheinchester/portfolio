<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public static function upload_image(Request $request, $cover_image){   
        $cover_image = 'cover_image';
        // Handle file upload
        //  [1] Get file name with extension
        //  [2] Get just file name
        //  [3] Get just extension
        //  [4] store file name as
        //  [5] upload image
         if ($request->hasFile('cover_image')) {
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();//1
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);//2
            $extension = $request->file('cover_image')->getClientOriginalExtension();//3
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;//4
            $path =  $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);//5
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        return $fileNameToStore;
    }
}
