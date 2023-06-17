<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\category;
use App\Models\Loan;
use App\Models\PenaltyPayment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
//   

class LoanController extends Controller
{
    public function index(Request $request)
    {
        $today = Carbon::now()->toDateString();

        Loan::where('end_date', '<', $today)
            ->where('status', '!=', 'kena denda')
            ->update(['status' => 'kena denda']);

        $loans = Loan::with("User", "Book")->get();


        // return response()->json($loans);

        return view('admin.loan.index', compact("loans"));
    }

    public function create()
    {
        $users = User::where('id', '!=', 1)->get();
        $books = book::all();

        return view('admin.loan.create', compact("users", "books"));
    }

    public function detail_loan($id)
    {
        $books = book::findOrFail($id);
        $category = category::all();
        // $categorys = category::findOrFail($id);

        return view('admin.loan.detail-loan', compact("books", "category"));
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'book_id' => 'required',
            'amount' => 'required',
        ]);
        // loan::create($request->all());
        $book = new Loan();
        // $book ['user_id'] = auth()->user()->id;
        $book->user_id = $request->get('user_id');
        $book->start_date = Carbon::now()->toDateString(); // Menggunakan fungsi now() untuk mendapatkan tanggal dan waktu saat ini

        // Menambahkan 3 hari ke tanggal book untuk mendapatkan tanggal kembali
        $tanggalKembali = Carbon::parse($book->start_date)->addDays(5);
        $book->end_date = $tanggalKembali;
        $book->book_id = $request->get('book_id');
        $book->amount = $request->get('amount');
        $book->status = 'dipinjam';
        $book->forfeit = 0;

        $book->save();
        // Kurangi jumlah buku yang tersedia
        $book = book::find($request->get('book_id'));
        $book->amount_id -= $request->get('amount');
        $book->save();
        // return response()->json($book);

        return redirect()->route('loan-index');
    }

    public function return()
    {
        // $loans = Loan::with("User", "Book")->get();
        $loan = Loan::where('status', 'dikembalikan')->orWhere('status', 'kena denda')->get();

        return view('admin.loan.return', [
            'loan' => $loan
        ]);
    }

    public function update(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);
        //menghitung tanggal hari ini
        $tanggalhari = Carbon::today();

        $data = Carbon::createFromFormat('Y-m-d', ($loan['end_date']));

        //Menghitung selisih hari
        $selisihhari = $data->diffInDays($tanggalhari);
        $forfeit = $selisihhari * 2000;

        if ($loan->status == 'kena denda') {
            $loan->update([
                'forfeit' => $forfeit,
            ]);
            return redirect()->route('loan-return');
            // return response()->json($loan);
        }else{
            $loan->update([
                'status' => 'dikembalikan',
            ]);
            return redirect()->route('loan-return');
            // return response()->json($loan);
        }
    }
}
