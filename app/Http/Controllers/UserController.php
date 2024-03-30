<?php
// 65160100
namespace App\Http\Controllers;
use App\Models\UsersInfo; // นำเข้า Model User
use Illuminate\Http\Request;

class UserController extends Controller
{
    // แสดงรายการผู้ใช้ทั้งหมด
    public function index()
    {
        $users = UsersInfo::all();
        return view('homepage', compact('users'));
    }

    // แสดงแบบฟอร์มสำหรับเพิ่มผู้ใช้ใหม่
    public function create()
    {
        return view('addpage');
    }

    // บันทึกข้อมูลผู้ใช้ใหม่
    public function store(Request $request)
    {
        // หา id ล่าสุดในตาราง
        $latestId = UsersInfo::orderBy('id', 'desc')->value('id');

        // หากไม่มีข้อมูลในตารางให้กำหนด id เริ่มต้นเป็น 1
        if(!$latestId) {
            $latestId = 1;
        } else {
            // มีข้อมูลในตาราง ให้เพิ่มค่า id ที่ใช้งานล่าสุดไป 1
            $latestId++;
        }

        // ตรวจสอบและบันทึกข้อมูลผู้ใช้ใหม่
        $validatedData = $request->validate([
            'title' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:usersinfo,email',
            'password' => 'required|min:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:9999',
        ]);

        // สร้าง instance ของ UsersInfo
        $user_info = new UsersInfo();

        // กำหนดค่าฟิลด์ต่าง ๆ
        $user_info->id = $latestId; // กำหนดค่า id
        $user_info->titles = $request->title;
        $user_info->name = $request->name;
        $user_info->email = $request->email;
        $user_info->password = bcrypt($request->password);

        // ตรวจสอบว่ามีการอัปโหลดรูปภาพหรือไม่
        if ($request->hasFile('avatar')) {
            $user_info->avatar = $request->file('avatar')->store('avatars');
        }

        // บันทึกข้อมูลในฐานข้อมูล
        $user_info->save();

        // นำผู้ใช้ไปยังหน้า homepage ด้วยคำสั่ง redirect()
        return redirect('/')->with('success', 'User added successfully.');
    }

    // ลบข้อมูลผู้ใช้
    public function destroy($id)
    {
        // ค้นหาและลบข้อมูลผู้ใช้งาน
        $user = UsersInfo::findOrFail($id);
        $user->delete();

        // รีเฟรชลำดับ ID ใหม่
        $this->refreshIds();

        return redirect('/')->with('success', 'User deleted successfully.');
    }

    // ฟังก์ชันสำหรับรีเฟรชลำดับ ID ใหม่
    private function refreshIds()
    {
        $newId = 1;
        $users = UsersInfo::orderBy('id')->get();

        foreach ($users as $user) {
            $user->id = $newId++;
            $user->save();
        }
    }

    // แสดงแบบฟอร์มสำหรับแก้ไขข้อมูลผู้ใช้
    public function edit($id)
    {
        $user = UsersInfo::findOrFail($id);
        return view('editpage', compact('user'));
    }

    // อัปเดตข้อมูลผู้ใช้ที่ถูกแก้ไข
    public function update(Request $request, $id)
    {
        // ค้นหาข้อมูลผู้ใช้ด้วย id
        $user_info = UsersInfo::findOrFail($id);

        // ตรวจสอบและบันทึกข้อมูลผู้ใช้ที่แก้ไข
        $validatedData = $request->validate([
            'title' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:usersinfo,email,'.$id,
            'password' => 'nullable|min:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:9999',
        ]);

        // กำหนดค่าฟิลด์ต่าง ๆ ที่มีการแก้ไข
        $user_info->titles = $request->title;
        $user_info->name = $request->name;
        $user_info->email = $request->email;
        if ($request->filled('password')) {
            $user_info->password = bcrypt($request->password);
        }

        // ตรวจสอบว่ามีการอัปโหลดรูปภาพหรือไม่
        if ($request->hasFile('avatar')) {
            $user_info->avatar = $request->file('avatar')->store('avatars');
        }

        // บันทึกข้อมูลในฐานข้อมูล
        $user_info->save();

        // ส่งกลับไปยังหน้า homepage พร้อมกับข้อความ success
        return redirect('/')->with('success', 'User updated successfully.');
    }
}
