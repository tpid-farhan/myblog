<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\PostTag;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $posts = Post::orderBy('id','desc')->paginate(10);
        return view('posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::orderBy('name','asc')->get();
        $tags = Tag::all();
        return view('posts.create',['categories'=>$categories,'tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // validate the request
        $this->validate($request, array(
            'title'=>'required|max:255',
            'slug'=>'required|max:255|min:5|alpha_dash|unique:posts,slug',
            'category'=>'required',
            'body'=>'required'
           
        ));
        
        // store the data in database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->categories_id = $request->category;
        $post->body = $request->body;
        $post->save();
        $post->tags()->sync($request->tags,false);

        Session::flash('success','The blog was successfully save !');

        // redirect to intended page
        return redirect()->route('posts.show',$post->id);
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
        return view('posts.show',['post'=>$post]);
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
        $categories = Category::orderBy('name','asc')->get();
        $tags = Tag::all();
        return view('posts.edit',['post'=>$post, 'categories'=>$categories, 'tags'=>$tags]);
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
        $post = Post::find($id);
        if($request->slug == $post->slug){
            $this->validate($request,array(
                'title' => 'required|max:255',
                'body' => 'required',
                'category'=>'required'
            ));
        }else{
            $this->validate($request,array(
                'title' => 'required|max:255',
                'slug'=>'required|max:255|min:5|alpha_dash|unique:posts,slug',
                'category'=>'required',
                'body' => 'required'
            ));
        }   

        $post = Post::find($id);
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->categories_id = $request->category;
        $post->body = $request->body;
        $post->save();
        if(isset($request->tags)){
            $post->tags()->sync($request->tags);
        }else{
            $post->tags()->sync(array());
        }
      
        Session::flash('success','The post was successfully updated !');
        return redirect()->route('posts.show',$post->id);
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
        $post->tags()->detach();
        $post->delete();
        
        Session::flash('success','The post was successfully deleted !');
        return redirect()->route('posts.index');
    }
}
