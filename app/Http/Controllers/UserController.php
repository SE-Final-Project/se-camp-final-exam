<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //สร้าง index
    public function index(){
        $data['users'] = User::all();
        return view('users.homepage', $data);
    }
    // create
    public function create(){
        return view('users.addpage');
    }
    public function store(Request $request)
    {
        $user= new User();

        $user->title = $request->title;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->avatar = $request->avatar;
        $user->save();
        return redirect()->route('home.index');
    }
    public function edit(string $id)
    {

        $new_data = User::find($id);
        if($new_data === null){
            return redirect()->route('home.index');
        } else{
            return view("users.editpage",compact("new_data"));
        }
    }
    public function update(Request $request, string $id)
    {
        $title = $request -> input("title");
        $name = $request -> input("name");
        $email = $request -> input("email");
        $avatar = $request -> input("avatar");

        $user = User::find($id);


        $user -> name =$request->name;
        $user -> email =$request->email;
        $user -> avatar =$request->avatar;

        $user -> save();

        return redirect()->route('home.index');
    }
    public function destroy(String $id){
        $user = User::find($id);
        $user -> delete();
        return redirect()->route('home.index');
    }
}
