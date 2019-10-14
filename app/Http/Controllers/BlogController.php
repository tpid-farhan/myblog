<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{   
    public function getArchive(){
        $posts = Post::orderBy('id','desc')->paginate(10);
        return view('pages/blog',['posts'=>$posts]);
    }

    public function getSingle($slug){
        $post = Post::where('slug',$slug)->first();
        return view('pages/single',['post'=>$post]);
    }
}
