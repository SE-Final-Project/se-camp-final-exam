<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // บันทึกข้อมูลผู้ใช้ใหม่ลงในฐานข้อมูล
    public function store(Request $request)
    {
        // กำหนดข้อมูลต่างๆ จากฟอร์มที่ส่งมาให้
        $users = new User;
        $users->title = $request->input('title');
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = $request->input('password');
        $users->avatar = $request->input('avatar');
        $users->save();

        // ถ้าในการส่งข้อมูล $request มีไฟล์ก็จะทำในนี้
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = $users->id . '.' . $extension;
            $file->move(public_path('uploads'), $filename);
            $users->avatar = $filename;
            $users->save();
        }

        // หลังจากบันทึกข้อมูลเสร็จแล้ว จะทำการ redirect กลับไปยังหน้าแสดงข้อมูลผู้ใช้พร้อมกับส่งข้อความแจ้งเตือนว่าการเพิ่มผู้ใช้สำเร็จ
        return redirect(url('/'))->with('success', 'User added successfully');
    }
    // ดูข้อมูล
    public function index()
    {
        $users = User::all();
        // ส่งข้อมูลไปหน้า homepage
        return view('homepage', ['users' => $users]);
    }

    // คำสั่งแก้ไขข้อมูล user
    public function edit($id)
    {
        $user = User::find($id);
        // หากผู้ใช้ไม่พบ user จะไปยังหน้า homepage พร้อมกับแสดงข้อความว่า ไม่พบผู้ใช้
        if (!$user) {
            return redirect('/')->with('error', 'User not found.');
        }

        // ไปหน้า editpage
        return view('editpage', compact('user'));
    }
    // อัปเดตข้อมูลของ user || รับพารามิเตอร์ $request  , $id
    public function update(Request $request, $id)
    {
        // รับข้อมูลที่ต้องการอัปเดต
        $user = User::find($id);
        $user->title = $request->input('title');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->avatar = $request->input('avatar');

        // ถ้าในการส่งข้อมูล $request มีไฟล์ก็จะทำในนี้
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = $user->id . '.' . $extension;
            $file->move(public_path('uploads'), $filename);
            $user->avatar = $filename;
            $user->save();
        }

        // อัปเดตเสร็จะส่งกลับไปหน้า homepage
        $user->save();
        return redirect('/');
    }
    // คำสั่งปุ่มลบข้อมูล
    public function delete($id)
    {
        // พบผู้ใช้งาน
        $user = User::find($id);
        // หากผู้ใช้ไม่พบผู้ใช้ จะไปยังหน้า homepage พร้อมกับแสดงข้อความว่า ไม่พบผู้ใช้
        if (!$user) {
            return redirect('/')->with('error', 'User not found.');
        }

        // ลบผู้ใช้งาน
        $user->delete();

        // หลังจากลบเสร็จแล้วจะส่งค่าไปที่ JSON จะแสดงข้อความว่าเสร็จสิ้น
        return response()->json(['success' => true]);
    }
}
