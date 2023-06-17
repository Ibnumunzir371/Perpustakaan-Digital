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

    public function create(){
        
        return view('admin.member.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nis' => 'required|unique:users',
            'class' => 'required',
            'name' => 'required',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route("member-index");
    }

    public function edit($id){
        $member = User::where("id", $id)->first();

        return view('admin.member.edit',compact("member"));
    }

    public function update(Request $request, $id){
        $member = User::where("id", $id)->first();
        $member->update($request->all());

        return redirect()->route("member-index");
    }
}
