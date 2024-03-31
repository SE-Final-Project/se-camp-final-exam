<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Title;
use Illuminate\Http\Request;
//65160216 ญาณากร ทองนพคุณ
class UserController extends Controller {
    public function index() {
        $users = User::with('title')->get();

        return view('homepage', ['users' => $users]);
    }

    //65160216 ญาณากร ทองนพคุณ
    //avatar null เพราะไม่จำเป็นต้องใส่
    //ฟังก์ชั่น เพิ่มผู้ใช่
    // บังคับให้ผู้ใช้กรอก ชื่อ เมล พาส คำนำหน้า แต่ไม่จำเป็นต้องใส่รูป
    public function addUser(Request $req) {
        $data = $req->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'avatar' => 'nullable',
            'title_id' => 'required',
        ]);
        if ($req->hasFile('avatar')) {
            $Avatar = $req->file('avatar');
            $avatarst = $Avatar->store('public/avatars');
            $data['avatar'] = basename($avatarst);
        }
        $data['password'] = bcrypt($data['password']);
        $user = new User($data);
        $user->save();

        return redirect()->route('home');
    }

    public function showAddPage() {
        $titles = Title::all();

        return view('addpage', compact('titles'));
    }

    //65160216 ญาณากร ทองนพคุณ
    //ฟังก์ชั่น ลบ
    public function deleteUser($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('home');
    }

    //65160216 ญาณากร ทองนพคุณ
    //ฟังก์ชั่น โชว์หน้าแก้ไขข้อมูลผู้ใช้
    public function editUser($id) {
        $user = User::findOrFail($id);
        $titles = Title::all();

        return view('editpage', compact('user', 'titles'));
    }

    //65160216 ญาณากร ทองนพคุณ
    //ฟังก์ชั่น อัพเดทข้อมูล
    //ห้ามใช้อีเมลเดิมของผู้ใช้คนอื่น
    // บังคับให้ผู้ใช้กรอก ชื่อ เมล และคำนำหน้า ไม่จำเป็นต้องใส่รูป
    public function rewriteUser(Request $request, $id) {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'password' => 'nullable',
            'avatar' => 'nullable|image',
            'title_id' => 'required',
        ]);
        $user = User::findOrFail($id);
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarst = $avatar->store('public/avatars');
            $data['avatar'] = basename($avatarst);
        }
        if ($request->isMethod('PUT')) {
            $user->update($data);

            return redirect()->route('home');
        }
    }
}
