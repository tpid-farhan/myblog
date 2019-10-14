<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session; 

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id','asc')->paginate(10);
        return view('categories/index',['categories'=>$categories]);
    }   

    public function store(Request $request){
        // validate the request
        $this->validate($request, array(
            'name'=>'required|max:255',  
        ));

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        Session::flash('success','The Category was successfully saved !');
        
        return redirect()->route('categories.index');
    }
}
