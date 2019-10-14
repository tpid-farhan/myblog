<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex(){
        return view('pages.welcome');
    }

    public function getAbout(){
        $data = [];
        $data['fullname'] = 'La Ode Muhammad Farhan Fauzan';
        $data['email'] = 'ldmuhfarhanf@gmail.com';
        return view('pages.about',['data'=>$data]);
    }

    public function getContact(){
        return view('pages.contact');
    }

   
}
