<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request){
        $member = User::all();

        return view('admin.member.index', compact("member"));
    }

    // public function edit($id){
    //     $member = User::where("id", $id)->first();
        
    //     return view("admin.member.edit", compact("member"));
    // }

    public function destroy($id){
        $member = User::where("id", $id)->first();
        $member->delete();

        return redirect()->route("member-index");
    }
}
