<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\Title;
use App\Models\User;
use Illuminate\Http\Request;

// ณัฐดนัย ธาราโรจน์ชัยกุล 65160329

class C_User extends Controller
{
    //เก็บค่าข้อมูลทั้งหมดในตาราง users แล้วส่งไปที่หน้า homepage.blade.php
    public function index()
    {
        $users = User::all();
        return view('homepage', compact('users'));
    }

    //ไปหน้า addpage.blade.php
    public function create()
    {
        return view('addpage');
    }

    public function store(Request $request)
    {
        //สร้างตัวแปรของ model User
        $user = new User;
        //กำหนดค่า attribute ของModel User ด้วยข้อมูลที่รับมาจาก request
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        //บันทึก
        $user->save();

        //ถ้าข้อมูลที่รับมาจาก request มีไฟล์รูปจะเข้า if แล้ว หานามสกุลของไฟล์รูปภาพด้วย getClientOriginalExtension() แล้วสร้างชื่อไฟล์ใหม่โดยใช้ id ของuser กับนามสกุลไฟล์ โดยเก็บไว้ใน filename
        //แล้วย้ายรูปไปที่ uploads
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = $user->id . '.' . $extension;
            $file->move(public_path('uploads'), $filename);
            $user->avatar = $filename;
            $user->save();
        }
        //กลับหน้า homepage
        return redirect(url('/'));
    }
    //ดึงข้อมูล User จาก database โดยใช้ id แล้วส่งข้อมูล User ไปหน้า editpage.blade.php
    public function edit($id)
    {
        $user = User::find($id);
        return view('editpage', compact('user'));
    }

    public function update(Request $request, $id)
    {
        //หา User ที่ต้องการอัปเดต จาก database โดยใช้ id
        $user = User::find($id);
        //อัปเดตข้อมูล User ด้วยข้อมูลที่รับมาจาก request
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        //เช็คว่ามีไฟล์รูปภาพถูกอัปโหลดมากับ request หรือไม่ หากมีจะทำการอัปโหลดไฟล์รูปภาพใหม่
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = $user->id . '.' . $extension;
            $file->move(public_path('uploads'), $filename);

            //ตรวจสอบก่อนว่ามีรูปภาพเก่าอยู่หรือไม่ หากมีจะลบไฟล์เก่าออกจากโฟลเดอร์ uploads
            if ($user->avatar) {
                $oldAvatarPath = public_path('uploads') . $user->avatar;
                if (file_exists($oldAvatarPath)) {
                    unlink($oldAvatarPath);
                }
            }
            //อัปเดตรูปภาพ
            $user->avatar = $filename;
        }
        $user->save();
        //กลับหน้า homepage
        return redirect('/');
    }

    public function delete($id)
    {
        //หา User ที่ต้องการลบ จาก database โดยใช้ id เมื่อหาเจอแล้วจะทำการลบ
        $user = User::find($id);
        $user->delete();
        //เมื่อทำสิ้นสิ้นแล้ว คืนค่า value ของ success เป็น true
        return response()->json(['success' => true]);
    }
}
