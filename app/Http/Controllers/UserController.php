<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Title;

class UserController extends Controller
{
    public function index(){
        $data ['users'] = User::orderBy('id','asc')->paginate(5);
        return view("homepage", $data);
    }
    public function create(){
        $data['titles'] = Title::orderBy('id','asc')->get();
        return view("addpage", $data);
    }
    public function store(){

    }
    public function edit(User $user){
        $data["titles"] = Title::orderBy('id','asc')->get();
        return view("editpage", $data, compact("user"));
    }
    public function update(){

    }
    public function destroy(String $id){
        $user=User::find($id)->delete();
        return redirect()->route("user.index");
    }
}
