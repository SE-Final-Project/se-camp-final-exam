<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
Use Illuminate\Support\Facades\DB;
class C_Controller extends Controller
{
    public function store(Request $request) // request เก็บค่าตัวแปร input แสดงตามลำดับ,ดึงข้อมูลผู้ใช้ ชื่อ อีเมล รหัสผ่าน avatar
    {
        $user = new User;
        $user->name = $request->input('name'); 
        $user->email = $request->input('email');
        $user->password =$request->input('password');
        $user->avatar = $request->input('avatar');
        $user->save();

        if ($request->hasFile('avatar')) { //ถ้ามีไฟล์ avatar จะอัปโหลด
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = $user->id . '.' . $extension;
            $file->move(public_path('uploads'), $filename);
            $user->avatar = $filename;
            $user->save();
        }
        return redirect(url('/')); 
        
        }
    public function index(){ //เก็บค่าทั้งหมดเข้า user ส่งไปที่หน้า homepage 65160106 ณัฏฐ์ภพ
        $user = User::all();
        return view('homepage',compact('user'));
    }
    public function edit($id) //นี้ดึงข้อมูลผู้ใช้จากฐานข้อมูลตาม ID และส่งข้อมูลผู้ใช้ไปยัง editpage 65160106 ณัฏฐ์ภพ
    {
        $user = User::find($id);
        return view('editpage', compact('user'));
    }

    public function update(Request $request, $id)  //อัพเดทชื่อ อีเมล รูป avatar 65160106 ณัฏฐ์ภพ 
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = $user->id . '.' . $extension;
            $file->move(public_path('uploads'), $filename);
            $user->avatar = $filename;
            $user->save();
        }
        return redirect('/');
    }
 
    public function delete($id)  //ลบข้อมูล 65160106 ณัฏฐ์ภพ
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['success' => true]);
        
    }
}
