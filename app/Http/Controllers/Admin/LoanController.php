<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index(Request $request){
        // $loan = loan::all();

        return view('admin.loan.index');
    }
}
