<?php

// namespace App\Http\Controllers\Admin;
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\category;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bookcount = book::count();
        $membercount = User::count();
        $loancount = Loan::count();
        $categorycount = category::count();
        // $membercount =

        //halaman dashboard user
        // $loan = Loan::all();
        // Mendapatkan ID user yang sedang login
        $userId = Auth::id();
        
        // Mengambil data pinjaman sesuai dengan user yang sedang login
        $loan = Loan::where('user_id', $userId)
            ->whereIn('status', ['dipinjam'])
            ->get();

        return view('admin.dashbord.home', compact('bookcount','membercount','loancount','categorycount','loan'));
    }

}
