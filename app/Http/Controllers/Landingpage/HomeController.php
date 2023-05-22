<?php

namespace App\Http\Controllers\Landingpage;

use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\category;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class HomeController extends Controller
{
    public function index(Request $request){
        $category = category::all();
        $books = book::with("category")->get()->random(3);
        $bookcount = book::count();
        $membercount = User::count();
        return view('landingpage.index', compact("category","bookcount","membercount","books"));
        
    }

    public function listbook($id){
        $category = category::all();
        $books = book::findOrFail($id);
        // menangkap 1 kategori berdasarkan id tanpa looping
        $bookall = $books->with("category")->where("category_id",$id)->get();
        $books_terbaru = $books->latest()->get()->random(3);
        
        
        return view('landingpage.listbook', compact("category","bookall","books","books_terbaru"));

        // return $books;
    }

    public function showpdf(){
        
    }
}
