<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
       $indexTitle = 'This is the home page';
       return view('pages.index')->with('title', $indexTitle);
    }

    public function about()
    {
       $aboutTitle = 'This is the about page';
       return view('pages.about')->with('title', $aboutTitle);
    }

    public function contact()
    {
       $contactTitle = 'This is the contact page';
       return view('pages.contact')->with('title', $contactTitle);
    }

    public function services()
    {
        $data = array(  
            'title' =>'Services',
            'response' =>'Please insert Data',
            'skills'=>['PHP', 'Java', 'Javascript', 'Python']
            );
        $servicesTitle = 'This is the services page';
       return view('pages.services')->with($data);
    }
}
