<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class C_User extends Controller
{
    //เก็บข้อมูลทั้งหมดเข้า user และส่งข้อมูลไปยังหน้า homepage //65160240 นายอภิภัสร์ ทศพร
    public function index(){
        $user = User::all();
        return view('homepage',compact('user'));
    }
    public function create(){
        return view('addpage');
    }

    //จะเป็นการเก็บข้อมูลต่างไว้ในค่าตัวแปรที่กำหนดไว้ //65160240 นายอภิภัสร์ ทศพร
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        //ถ้าใน $request มีไฟล์อยู่ //65160240 นายอภิภัสร์ ทศพร
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = $user->id . '.' . $extension;
            $file->move(public_path('picture'), $filename);
            $user->avatar = $filename;
            $user->save();
        }
        return redirect(url('/'));
    }

    //นำข้อมูลที่ user ที่เลือกส่งไปยังหน้า edit //65160240 นายอภิภัสร์ ทศพร
    public function edit($id){
        $user = User::find($id);
        return view('editpage',compact('user'));
    }

//ส่งข้อมูล user ที่แก้ไขและบันทึกส่งกลับไปหน้าหลัก //65160240 นายอภิภัสร์ ทศพร
    public function update(Request $request,$id){
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        //ถ้าใน $request มีไฟล์อยู่ //65160240 นายอภิภัสร์ ทศพร
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = $user->id . '.' . $extension;
            $file->move(public_path('picture'), $filename);
            $user->avatar = $filename;
            $user->save();
        }

        return redirect('/');
    }

    //ลบข้อมูล user ที่เลือกจะมีการแสดง Alert เมื่อลบเสร็จสิ้นข้อมูลที่ต่อจากข้อมูลที่ลบจะขยับ id นั้น //65160240 นายอภิภัสร์ ทศพร
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return response()->json(['success' => true]);
    }

}
