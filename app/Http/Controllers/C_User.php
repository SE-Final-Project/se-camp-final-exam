<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class C_User extends Controller
{
    //
    public function index(){
        $users = User::all();
        return view('homepage',compact('users'));
    }

    public function create(){
        return view('addpage');
        //แสดงหน้าเว็บสำหรับเพิ่ม User
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        //บันทึกข้อมูลผู้ใช้ใหม่ลงในฐานข้อมูล
        if ($request->hasFile('avatar')) {
            //เช็คการอัปโหลดไฟล์ avatar
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = $user->id . '.' . $extension;
            $file->move(public_path('uploads'), $filename);
            $user->avatar = $filename;
            $user->save();
        }
        return redirect(url('/'));
        //กลับไปแสดงค่าที่หน้าหลัก
    }
    public function edit($id){
        $user = User::find($id);
        return view('editpage',compact('user'));
        //หาค่า id จาก user เมื่อพบข้อมูลจะแสดงหน้าสำหรับแก้ไขข้อมูล
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        //เช็คค่าว่ามีการส่งไฟล์ avater มาใน request หรือไม่
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = $user->id . '.' . $extension;
            $file->move(public_path('uploads'), $filename);

            //ถ้ามี avatar เดิมอยู่แล้วจะลบ avatar เดิมออกจากโฟลเดอร์
            if ($user->avatar) {
                $oldAvatarPath = public_path('uploads') . $user->avatar;
                if (file_exists($oldAvatarPath)) {
                    unlink($oldAvatarPath);
                }
            }

            //อัปเดตชื่อไฟล์ avatar ใหม่
            $user->avatar = $filename;
        }

        $user->save();

        return redirect('/');
        //กลับไปแสดงค่าที่หน้าหลัก
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        //ลบข้อมูลออกจากระบบด้วยคำสั่ง delete()
        return response()->json(['success' => true]);
    }
}
