<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // หรือใช้ตามชื่อ Model ของคุณ

class UserController extends Controller
{
    // 1. ฟังก์ชันสำหรับแสดงข้อมูลหน้า home
    public function index()
    {
        $users = User::all(); // ดึงข้อมูลผู้ใช้ทั้งหมด
        return view('homepage', compact('users')); // แสดงหน้า home พร้อมข้อมูลผู้ใช้
    }

    // 2. ฟังก์ชันสำหรับแสดงข้อมูลหน้า add
    public function create()
    {
        return view('addpage'); // แสดงหน้า add
    }

    // 3. ฟังก์ชันสำหรับแสดงข้อมูลหน้า edit
    public function edit($id)
    {
        $user = User::findOrFail($id); // ค้นหาข้อมูลผู้ใช้ตาม ID
        return view('editpage', compact('user')); // แสดงหน้า edit พร้อมข้อมูลผู้ใช้
    }

    // 4. ฟังก์ชันสำหรับบันทึกข้อมูลที่เพิ่ม (Add)
    public function store(Request $request)
    {
        // ทำการ validate ข้อมูล
        $validatedData = $request->validate([
            'title' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            // สามารถเพิ่ม validation rules สำหรับการอัพโหลดไฟล์ avatar ตามต้องการ
        ]);

        // บันทึกข้อมูลผู้ใช้
        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User added successfully');
    }

    // 5. ฟังก์ชันสำหรับบันทึกข้อมูลที่แก้ไข (Edit)
    public function update(Request $request, $id)
    {
        // ค้นหาข้อมูลผู้ใช้ตาม ID
        $user = User::findOrFail($id);

        // ทำการ validate ข้อมูล
        $validatedData = $request->validate([
            'title' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            // สามารถเพิ่ม validation rules สำหรับการอัพโหลดไฟล์ avatar ตามต้องการ
        ]);

        // อัพเดทข้อมูลผู้ใช้
        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    // 6. ฟังก์ชันสำหรับลบข้อมูล
    public function destroy($id)
    {
        // ค้นหาและลบข้อมูลผู้ใช้ตาม ID
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
