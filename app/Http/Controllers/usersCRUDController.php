<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class usersCRUDController extends Controller
{
     //1.สร้าง Index
     public function index(){
        $data['users'] = User::orderBy('id' , 'desc')->paginate(5);
        return view('users.homepage' , $data);
    }

    //2.create resource
    public function create(){
        return view('users.addpage');
    }

    //3.create store
    //การเพิ่มข้อมูลจะต้อง POST ดังนั้นต้องรับ Request
    public function store(Request $request){
        $request->validate([
            'name' => 'required' ,
            'email' => 'required' ,
            'password' => 'required' ,
            'avatar' => 'nullable' ,
        ]);

        $user = new User; //เพิ่มตัสแปรมาเก็บข้อมูล
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        if($request->hasFile('avatar')){
            $fileName = time().$request->file('avatar')->getClientOriginalName();
            $path = $request->file('avatar')->storeAs('images' , $fileName,'public');
            $user["avatar"] = '/storage/'.$path;
        }
        $user->save();
        return redirect()->route('users.index')->with('success' , 'User has been created Successfully.!');
    }

    public function edit(string $id){
        $user = User::findOrFail($id);
        return view('users.editpage' , compact('user'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required' ,
            'avatar' => 'required'
        ]
);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $fileName = time().$request->file('avatar')->getClientOriginalName();
        $path = $request->file('avatar')->storeAs('images' , $fileName,'public');
        $user["avatar"] = '/storage/'.$path;
        $user->save();
        return redirect()->route('users.index')->with('success' , 'user updates successfully');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users.index')->with('success' , 'User has been delete Successfully.!');
    }
}
