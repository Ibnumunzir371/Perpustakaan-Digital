<?php

namespace App\Http\Controllers\Landingpage;
use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $category = category::all();
        // $books = book::where("category","");
        $bookall = book::latest()->get();

        return view('landingpage.index', compact("category","bookall"));
        // return response()->json($categorys);
        // debug mencara kesalahan 
    }

    public function book_category($id){
        $category = category::all();
        $books = book::findOrFail($id);
        $bookall = $books->with("category")->where("category_id",$id)->get();
        
        return view('landingpage.index', compact("category","bookall","books"));

        // return $books;
    }
}
