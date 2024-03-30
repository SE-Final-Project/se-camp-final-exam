<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Title;

class UserController extends Controller
{

    public function index(){
        $data['users'] = User::orderBy('id','asc')->get();
        return view('homepage',$data)->with('number',1);
    }
    public function create(){
        $data['titles'] = Title::orderBy('id','asc')->get();
        return view("addpage", $data);
    }
    public function store(Request $request){
        $request->validate([
            "title"=> "required",
            "name"=> "required",
            "email"=> "required",
            "password"=> "required",
        ]);
        $user = new User;
        $user->title_id = $request->title;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        if($request->hasfile('avatar')){
            $file = $request->file('avatar');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/user/',$filename);
            $user->avatar = $filename;

        }
        $user->save();

        return redirect()->route("user.index")->with("success");
    }
    public function edit(User $user){
        $data["titles"] = Title::orderBy('id','asc')->get();
        return view("editpage", $data, compact("user"));
    }
    public function update(Request $request, $id){
        $request->validate([
            "title"=> "required",
            "name"=> "required",
            "email"=> "required",
        ]);
        $user = User::find( $id );
        $user->title_id = $request->title;
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->hasfile('avatar')){
            $file = $request->file('avatar');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/user/',$filename);
            $user->avatar = $filename;

        }

        $user->save();
        return redirect()->route("user.index")->with("success","");
    }
    public function destroy(String $id){
        $user=User::find($id)->delete();
        return redirect()->route("user.index")->with("success","");
    }
}
