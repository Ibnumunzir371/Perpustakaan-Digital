<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(Request $request){
        $book = book::with("category")->get();
        // dd($book);
        // return response()->json($book);

        return view('admin.book.index', compact("book"));
    }

    public function create(){
        $category = category::all();
        // return response()->json($category1);
        return view('admin.book.create', compact("category"));
    }

    public function store(Request $request){
        $book = book::create($request->all());
        // if($request->hasfile('file_book')){
        //     $request->file('file_book')->move('backend/document/',$request->file('file_book')->getClientOriginalName());
        //     $book->file_book = $request->file('file_book')->getClientOriginalName();
        //     $book->save();
        // }
        // if($request->hasfile('cover_book')){
        //     $request->file('cover_book')->move('backend/images/',$request->file('cover_book')->getClientOriginalName());
        //     $book->cover_book = $request->file('cover_book')->getClientOriginalName();
        //     $book->save();
        // }

        $path = $request->file('file_book')->store('file','public');
        $url = Storage::url($path);
        // return $url;

        $path = $request->file('cover_book')->store('images','public');
        $url = Storage::url($path);
        // return $url;
        return redirect()->route("book-index");
        
    }

    public function edit($id){
        $category = category::all();
        $book = book::where("id", $id)->first();
        // return response()->json($book,$category);
        // dd($book,$category);
        return view('admin.book.edit', compact("book","category"));
    }

    public function destroy($id){
        $book = book::where("id", $id)->first();
        $book ->delete();

        return redirect()->route("book-index");
    }
}
