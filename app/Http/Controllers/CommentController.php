<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Session;

class CommentController extends Controller
{   

    public function __construct(){
        $this->middleware('auth',['except'=>'store']);
    }
 
    public function store(Request $request, $post_id)
    {   
        $this->validate($request,array(
            'name'=>'required|max:255',
            'email'=>'required|email|max:255',
            'comment'=>'required|min:5|max:2000'
        ));

        $post = Post::find($post_id);
        $comment = new Comment;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;

        $comment->post()->associate($post);
        $comment->save();

        Session::flash('success','The comment was succesfully stored!');

        return redirect()->route('blog.single',$post->slug);
    }


    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments/edit',['comment'=>$comment]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,array(
            'comment'=>'required|min:5|max:2000'
        ));

        $comment = Comment::find($id);
        $comment->comment = $request->comment;
        $comment->save();

        Session::flash('success','The Comment was successfully updated!');

        return redirect()->route('posts.show',$comment->post->id);
    }

    public function delete($id){
        $comment = Comment::find($id);
        return view('comments.delete',['comment'=>$comment]);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post->id;
        $comment->delete();

        Session::flash('success','The Comment was successfully deleted !');

        return redirect()->route('posts.show',$post_id);
    }
}
