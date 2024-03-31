<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Title;

class UserController extends Controller
{
    //ดึงข้อมูลมาจาก database แล้วส่งไปที่หน้า homepage 65160359 สิริกร
    public function index()
    {
        $users_data = User::orderBy('id', 'asc')->paginate(5);
        return view('homepage', compact('users_data'));
    }

    //รับค่าจาก form เพื่อสร้าง user ใหม่ใน database 65160359 สิริกร
    public function create()
    {
        $titles = Title::orderBy('id', 'asc')->get();
        return view('addpage', compact('titles'));
    }

    public function store(Request $request)
    {
        //เช็คว่า input ครบตามมั้ย 65160359 สิริกร
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'title_id' => 'required',
        ]);

        //สร้าง user ใหม่และบันทึกข้อมูลใน database 65160359 สิริกร
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->title_id = $request->title_id;
        $user->save();

        //กลับไปที่หน้า homepage 65160359 สิริกร
        return redirect()->route('user.index')->with('success', 'User created successfully');
    }

    //ดึงข้อมูล title จาก database และแสดงใน form 65160359 สิริกร
    public function edit(User $user)
    {
        $titles = Title::orderBy('id', 'asc')->get();
        return view('editpage', compact('user', 'titles'));
    }

    //อัพเดทที่มีอยู่แล้วใน database 65160359 สิริกร
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'title_id' => 'required'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->title_id = $request->title_id;
        $user->save();

        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }

    //ลบข้อมูล user ใน database
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
