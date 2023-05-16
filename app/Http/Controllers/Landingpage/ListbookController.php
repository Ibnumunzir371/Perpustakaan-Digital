<?php

namespace App\Http\Controllers\Landingpage;

use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\category;
use Illuminate\Http\Request;

class ListbookController extends Controller
{
    // public function index(Request $request){
    //     $categorys = category::select('name')->get();
    //     $books = book::all();

    //     return view('landingpage.listbook', compact('categorys','books'));
    // }

    // public function show($id){
    //     $category = category::all();
    //     $book = book::findOrFail($id);
    //     // return response()->json($book,$category);
    //     // dd($book,$category);
    //     return view('landingpage', compact("book","category"));
    // }
}
