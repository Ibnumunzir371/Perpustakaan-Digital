<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request){
        $category = category::all();

        return view('admin.category.index', compact("category"));
    }

    public function create(){
        $category = category::all();
        

        return view('admin.category.create', compact("category"));
    }

    public function store(Request $request){
        category::create($request->all());

        return redirect()->route("category-index");
    }

    public function destroy($id){
        $category = category::where("id", $id)->first();
        $category->delete();

        return redirect()->route("category-index");
    }

    public function edit($id){
        $category = category::where("id", $id)->first();
        
        return view("admin.category.edit", compact("category"));
    }

    public function update(Request $request, $id){
        $category = category::where("id", $id)->first();
        $category->update($request->all());

        return redirect()->route("category-index");
    }

}
