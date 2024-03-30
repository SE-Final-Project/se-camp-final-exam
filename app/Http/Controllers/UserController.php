<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Title;

class UserController extends Controller
{
    // add show homepage function
    // 65160232 พิชญุตม์ จงรักดี
    public function index(){
        $data ['users'] = User::orderBy('id','asc')->paginate(5);
        return view("homepage", $data);
    }
    // add show addpage function
    // 65160232 พิชญุตม์ จงรักดี
    public function create(){
        $data['titles'] = Title::orderBy('id','asc')->get();
        return view("addpage", $data);
    }
    public function store(){

    }
    // add show editpage function
    // 65160232 พิชญุตม์ จงรักดี
    public function edit(User $user){
        $data["titles"] = Title::orderBy('id','asc')->get();
        return view("editpage", $data, compact("user"));
    }
    public function update(){

    }
    // add delete function
    // 65160232 พิชญุตม์ จงรักดี
    public function destroy(String $id){
        $user=User::find($id)->delete();
        return redirect()->route("user.index");
    }
}
