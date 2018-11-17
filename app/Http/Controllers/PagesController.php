<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
       $indexTitle = 'This is the home page';
       $data = array(
        'title' => $indexTitle,
    );
       return view('pages.index')->with($data);
    }

    public function about()
    {
       $aboutTitle = 'This is the about page';
       $data = array(
        'title' => $aboutTitle,
    );
       return view('pages.about')->with($data);
    }

    public function contact()
    {
       $contactTitle = 'This is the contact page';
       $data = array(
        'title' => $contactTitle,
    );
       return view('pages.contact')->with($data);
    }

    public function services()  
    {
        $servicesTitle = 'This is the services page';
        $data = array(  
            'title' =>$servicesTitle,
            'response' =>'Please insert Data',
            'skills'=>['PHP', 'Java', 'Javascript', 'Python']
            );
       
       return view('pages.services')->with($data);
    }
}
