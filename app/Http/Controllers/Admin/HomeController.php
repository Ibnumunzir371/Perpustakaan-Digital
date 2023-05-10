<?php

// namespace App\Http\Controllers\Admin;
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bookcount = book::count();
        $membercount = User::count();
        // $membercount =
        return view('admin.dashbord.home', compact('bookcount','membercount'));
    }
}
