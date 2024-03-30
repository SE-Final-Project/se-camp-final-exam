<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class C_user extends Controller
{
    public function index()
    {
        //เก็บค่าเข้า users และ compact ไป homepage//
        $users = User::all();
        return view('homepage', compact('users'));
    }

    public function create()
    {
        //ไปหน้า addpage//
        return view('addpage');
    }
    //รับข้อมูลที่ส่งมาจาก $request, สร้าง User และบันทึก// 
    public function store(Request $request)
    {
        $users = new User;
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = $request->input('password');
        $users->save();
        // ตรวจสอบว่ามีไฟล์ avatar ถูกส่งมาหรือไม่ //
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = $users->id . '.' . $extension;
            $file->move(public_path('uploads'), $filename);
            // เชื่อมโยงชื่อไฟล์ avatar กับข้อมูลผู้ใช้ //
            $users->avatar = $filename;
            $users->save();
        }
        // แสดงไปยังหน้า homepage //
        return redirect(url('/'));
    }
    public function edit($id)
    {
        //ค้นหาข้อมุล User//
        $users = User::find($id);
        //เก็บค่าเข้า users และ compact ไป editpage//
        return view('editpage', compact('users'));
    }

    public function update(Request $request, $id)
    {
        //ค้นหาข้อมุล User//
        $user = User::find($id);
        // แก้ name, email, avatar 
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        //ตรวจสอบว่ามีไฟล์ avatar ถูกส่งมาหรือไม่//
        if ($request->hasFile('avatar')) {
            // รับไฟล์ avatar จาก request //
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = $user->id . '.' . $extension;
            $file->move(public_path('uploads'), $filename);
            //ตรวจสอบว่ามีไฟล์ avatar เก่าที่เกี่ยวข้องกับผู้ใช้นี้หรือไม่//
            if ($user->avatar) {
                $oldAvatarPath = public_path('uploads') . $user->avatar;
                if (file_exists($oldAvatarPath)) {
                    unlink($oldAvatarPath);
                }
            }
             // เชื่อมโยงชื่อไฟล์ avatar กับข้อมูลผู้ใช้ //
            $user->avatar = $filename;
        }

        $user->save();
        // แสดงไปยังหน้า homepage //
        return redirect('/');
    }

    public function delete($id)
    {
        //ค้นหาข้อมูลผู้ใช้//
        $users = User::find($id);
        //ลบข้อมูลผู้ใช้//
        $users->delete();
        //ส่งคำตอบในรูปแบบ json//
        return response()->json(['success' => true]);
    }
}
