<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * student id: 65160090
     * name: นายเจษฎา นาคะ
     * คำอธิบาย : เป็น Method ที่จะเรียกหน้าเพิ่มผู้ใช้งาน
     */
    public function index()
    {
        return view('addpage');
    }

    /**
     * student id: 65160090
     * name: นายเจษฎา นาคะ
     * คำอธิบาย : ไม่มีการใช้งาน
     */
    public function create()
    {
        //
    }

     /**
     * student id: 65160090
     * name: นายเจษฎา นาคะ
     * คำอธิบาย : เป็น method ที่จะคอยรับ request จาก form และทำการเพิ่มผู้ใช้งาน
     */
    public function store(Request $request)
    {
        $path = $request->file('avatar')->store('public/avatars');
        $data = User::create([
            'title_id' => $request->title,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'avatar' => $path,
        ]);

        $data->save();

        return redirect('/');
    }

    /**
     * student id: 65160090
     * name: นายเจษฎา นาคะ
     * คำอธิบาย : ไม่มีการใช้งาน
     */
    public function show(string $id)
    {
        //
    }

    /**
     * student id: 65160090
     * name: นายเจษฎา นาคะ
     * คำอธิบาย : เป็น method ที่ไว้ใช้ในการเรียกหน้า editpage พร้อมกับส่งค่าผุ้ใช้งานที่ต้องการแก้ไข
     */
    public function edit(string $id)
    {
        $datas = User::find($id);
        return view('editpage', compact('datas'));
    }

    /**
     * student id: 65160090
     * name: นายเจษฎา นาคะ
     * คำอธิบาย : เป็น method ที่ไว้ใช้ในการแก้ไขข้อมูลของผู้ใช้งาน
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if (Storage::exists($user->avatar)) {
            Storage::delete($user->avatar);
        }

        $path = $request->file('avatar')->store('public/avatars');
        $user->title_id = $request->title;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->avatar = $path;

        $user->save();

        return redirect('/');
    }

    /**
     * student id: 65160090
     * name: นายเจษฎา นาคะ
     * คำอธิบาย : เป็น method ที่ไว้ใช้ในลบผู้ใช้งาน
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (Storage::exists($user->avatar)) {
            Storage::delete($user->avatar);
        }
        $user->delete();
        return redirect('/');
    }
}
