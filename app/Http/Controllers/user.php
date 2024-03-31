<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Title;
use Illuminate\Http\Request;

class UserController extends Controller {
     // ดึงข้อมูลผู้ใช้ทั้งหมดพร้อมกับข้อมูล Title
    public function id() {
        $users = User::with('title')->get();

        return view('homepage', ['users' => $users]);
    }

    // เพิ่มผู้ใช้ใหม่
    public function addUser(Request $req) {
        $Validate = $req->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'avatar' => 'nullable',
            'title_id' => 'required',
        ]);

        // อัปโหลดภาพ
        if ($req->hasFile('avatar')) {
            $Avatar = $req->file('avatar');
            $avatarPath = $Avatar->store('public/avatars');
            $Validate['avatar'] = basename($avatarPath);
        }

        // เข้ารหัสรหัสผ่านและสร้างผู้ใช้ใหม่
        $Validate['password'] = bcrypt($Validate['password']);
        $user = new User($Validate);
        $user->save();

        return redirect()->route('home');
    }

     // เพิ่มผู้ใช้
    public function showAddPage() {
        $titles = Title::all();
        return view('addpage', compact('titles'));
    }


    // อัปเดตข้อมูล
    public function updateUser(Request $request, $id) {
        $Validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'password' => 'nullable',
            'avatar' => 'nullable|image',
            'title_id' => 'required',
        ]);
        $user = User::findOrFail($id);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarPath = $avatar->store('public/avatars');
            $Validate['avatar'] = basename($avatarPath);
        }

        // อัปเดตข้อมูล
        if ($request->isMethod('PUT')) {
            $user->update($Validate);
            return redirect()->route('home');
        }
    }

    // ลบผู้ใช้
    public function deleteUser($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('home');
    }

    public function editUser($id) {
        $user = User::findOrFail($id);
        $titles = Title::all();

        return view('editpage', compact('user', 'titles'));
    }
}
