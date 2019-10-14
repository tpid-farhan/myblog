<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::orderBy('name','asc')->paginate(10);
        return view('tags.index',['tags'=>$tags]);
    }

    public function store(Request $request)
    {
        $this->validate($request,array(
            'name'=>'required|max:255'
        ));

        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();

        Session::flash('success','Tag was successfully saved! ');
        return redirect()->route('tags.index');
    }

    public function show($id){
        $tags = Tag::find($id);
        return view('tags/show',['tags'=>$tags]);
    }

    public function edit($id){
        $tags = Tag::find($id);
        return view('tags/edit',['tags'=>$tags]);
    }

    public function update(Request $request, $id){
        $this->validate($request, array(
            'name'=>'required|max:255'
        ));

        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->save();

        Session::flash('success','The Tag was successfully updated !');

        return redirect()->route('tags.index');

    }

    public function destroy($id){
        $tag = Tag::find($id);
        $tag->posts()->detach();
        $tag->delete();

        Session::flash('success','The Tag was successfully deleted !');

        return redirect()->route('tags.index');
    }
}
