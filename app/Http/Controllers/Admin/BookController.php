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
        $this->validate($request, [
            'name' => 'required',
            'author' => 'required',
            'year' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'cover_book' => 'required','mimes:jpg,png,jpeg|image|max:2048',
            'file_book' => 'required','mimes:pdf',
        ]);
        
        // mengupload gambar tanpa required
        // $newName = '';
        // if($request->file('image')){
        //     $extension = $request->file('image')->getClientOriginalExtension();
        //     $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
        //     $request->file('image')->storeAs('images', $newName);
        // }
        
        // $request['cover_book'] = $newName;

        $book = book::create($request->all());
        if ($request->file('file_book')){
            $path = $request->file('file_book')->store('file','public');
            // $url = Storage::url($path);
            $book->file_book = $path;
        }
        
        if ($request->file('image')){
            $path = $request->file('image')->store('images','public');
            // $url = Storage::url($path);
            $book->cover_book = $path;
        }

        $book->save();

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

    public function update(Request $request, $id){
        $book = book::where("id", $id)->first();
        $book->update($request->all());

        // if ($request->hasFile('cover_book')){
        //     Storage::delete($book->cover_book);
        //     $path = $request->file('cover_book')->store('images','public');
        //     $book->cover_book = $path;
        // }

        return redirect()->route("book-index");
    }
}
