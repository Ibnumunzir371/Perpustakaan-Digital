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
        return view('landingpage.index', compact("category"));
        
    }

    public function book_category($id){
        $category = category::all();
        $books = book::findOrFail($id);
        $bookall = $books->with("category")->where("category_id",$id)->get();
        
        return view('landingpage.detail-book', compact("category","bookall","books"));

        // return $books;
    }
}
