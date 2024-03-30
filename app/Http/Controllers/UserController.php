<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Title;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){
        $Users = User::paginate(20);//ตั้งลิมิตการแสดงข้อมูลในหนึ่งหน้าว่าต้องการกี่คน
        $Titles = Title::all();
        return view('homepage',compact('Users','Titles'));//แสดงหน้าหลัก
    }
    function addUser(){
        $Titles = Title::all();
        return view('addpage',compact('Titles'));//แสดงหน้าเพิ่ม
    }
    function editUser($id){//แสดงหน้าแก้ไข
        $user = User::where('id',$id)->first();
        $Titles=Title::all();
        return view('editpage',compact('Titles'),compact('user'));//แนบไอดีเพื่อระบุUser
    }
    function createUser(Request $request){//เพิ่มUserใหม่
        $title = $request->input('title');
        $title= intval($title);
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $avatar = $request->file('file');
        $OGname = $avatar->getClientOriginalName();
        $avatar->move('assets/img', $OGname);
        User::create([
            'title_id'=>$title,
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'avatar'=>$OGname,
        ]);
        return redirect('/');
    }
    function destroy(int $id)//ลบUser
    {
        $User_id = User::where('id',$id);
        $User_id -> delete();
        return redirect('/');
    }
    function edit(Request $request,$id)//แก้ไขข้อมูลUser
    {
        $title = $request->input('title');
        $title= intval($title);//เปลี่ยนเป็นint
        $name = $request->input('name');
        $email = $request->input('email');

        $User = User::find($id);
        if ($User) {
            if ($request->file('file') !== null) {//เงื่อนไขเมื่อใส่รูปมาใหม่
                $avatar = $request->file('file');
                $OGname = $avatar->getClientOriginalName();
                $avatar->move('assets/img', $OGname);
                $User->update([
                    'title_id' => $title,
                    'name' => $name,
                    'email' => $email,
                    'avatar' => $OGname,
                ]);
            } else {//ไม่ได้ใส่รูป
                $User->update([
                    'title_id' => $title,
                    'name' => $name,
                    'email' => $email,
                ]);
            }
        }
        return redirect('/');
    }
}
