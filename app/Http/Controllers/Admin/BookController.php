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
            'name' => 'required|unique:books',
            'type_book' => 'required',
            'author' => 'required',
            'year' => 'required|numeric',
            'amount_id' => 'required',
            'add' => 'required',
            'category_id' => 'required',
            'cover_book' => 'required|image|mimes:jpg,png,jpeg|max:2048',               
            'file_book' => 'required|mimes:pdf',
        ]);
        
        // mengupload gambar tanpa required
        // $newName = '';
        // if($request->file('image')){
        //     $extension = $request->file('image')->getClientOriginalExtension();
        //     $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
        //     $request->file('image')->storeAs('images', $newName);
        // }
        
        // $request['cover_book'] = $newName;

        // $book = book::create($request->all());
        $book = new book;
        $book->name = $request->get('name');
        $book->type_book = $request->get('type_book');
        $book->category_id = $request->get('category_id');
        $book->author = $request->get('author');
        $book->year = $request->get('year');
        $book->add = $request->get('add');
        $book->amount_id = $request->get('amount_id');

        $pdf = '';
        if ($request->file('file_book')){
            $extension = $request->file('file_book')->getClientOriginalExtension();
            $pdf = $request->name.'.'.$extension;
            $request->file('file_book')->storeAs('file',$pdf);
            // $url = Storage::url($path);
            $book->file_book = $pdf;
        }
        
        if ($request->file('cover_book')){
            $image = $request->file('cover_book')->store('images','public');
            // $url = Storage::url($path);
            $book->cover_book = $image;
        }

        $book->save();

        // return response()->json($category1);
        return redirect()->route("book-index");
        
    }

    public function edit($id){
        $category = category::all();
        $book = book::findOrFail($id);
        // return response()->json($book,$category);
        // dd($book,$category);
        return view('admin.book.edit', compact("book","category"));
    }

    public function destroy($id){
        $book = book::findOrFail($id);
        $book->delete();

        return redirect()->route("book-index");
        // return($coba);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'type_book' => 'required',
            'author' => 'required',
            'year' => 'required|numeric',
            'amount_id' => 'required',
            'add' => 'required',
            'category_id' => 'required',
            'cover_book' => 'image|mimes:jpg,png,jpeg|max:2048',
            'file_book' => 'mimes:pdf',
        ]);
        
        $book = book::findOrFail($id);
        $book->name = $request->get('name');
        $book->category_id = $request->get('category_id');
        $book->type_book = $request->get('type_book');
        $book->author = $request->get('author');
        $book->year = $request->get('year');
        $book->add = $request->get('add');
        $book->amount_id = $request->get('amount_id');

        // Ketika melakukan pengecekan apakah file lama masih ada atau sudah dihapus,
        // perlu diganti fungsi file_exists dengan fungsi Storage::disk(). 
        // Hal ini karena saat menggunakan fungsi file_exists, 
        // terkadang tidak berhasil dalam menemukan file yang sudah terhapus.

        $pdf = '';
        if ($request->file('file_book')){
            // hapus file yang lama
            Storage::disk('public')->delete($book->file_book);
            $extension = $request->file('file_book')->getClientOriginalExtension();
            $pdf = $request->name.'.'.$extension;
            // simpan file yang baru
            $request->file('file_book')->storeAs('file',$pdf);
            // $url = Storage::url($path);
            $book->file_book = $pdf;
        }
        // $pdf = '';
        // if ($request->file('file_book')){
        //     $extension = $request->file('file_book')->getClientOriginalExtension();
        //     $pdf = $request->name.'-'.time().'.'.$extension;
        //     $request->file('file_book')->storeAs('file',$pdf);
        //     // $url = Storage::url($path);
        //     $book->file_book = $pdf;
        // }
        // if ($request->file('file_book')){
        //     // hapus file yang lama
        //     Storage::disk('public')->delete($book->file_book);
        //     // simpan file yang baru
        //     $pdf = $request->file('file_book')->store('file', 'public');
        //     $book->file_book = $pdf;
        // }
    
        if ($request->file('cover_book')){
            // hapus file yang lama
            Storage::disk('public')->delete($book->cover_book);
            // simpan file yang baru
            $image = $request->file('cover_book')->store('images', 'public');
            $book->cover_book = $image;
        }
        
        $book->save();

        // return response()->json($book);
        return redirect()->route("book-index");

    }
    
}
