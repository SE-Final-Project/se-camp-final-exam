<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

Use Illuminate\Support\Facades\DB;
// <!-- ชินธร สมบัติกำจรกุล 65160105 -->
class C_Controller extends Controller
{
    public function index(){
        $Users = User::all();
        return view('homepage',compact('Users'));
        // เก็บค่าทั้งหมดเข้า Users และส่งไปที่หน้า homepage
    }
    public function create(){
        return view('addpage');
        //  ไปที่หน้า addpage
    }
    public function store(Request $request){
        $Users = new User;
        // $Users->title = $request->input('title');
        $Users->name = $request->input('name');
        $Users->email = $request->input('email');
        $Users->password = $request->input('password');
        $Users->avatar = $request->input('avatar');
        // request จะเก็บค่าของตัวแปรต่างๆ แล้วจะถูก input ออกมาตามลำดับ

        $Users->save();

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = $Users->id.'.'.$extension;
            $file->move('uploads/',$filename);
            $Users->avatar = $filename;
            // ถ้าใน request มีไฟล์รูปภาพ จะให้ $file แล้วใช้งาน getClientOriginalExtension เพื่อดึงนามสกุลของไฟล์ที่เราเอาลง แล้วก็สร้างชื่อไฟล์ใหม่จาก id
            // และเก็บค่าไว้ใน filename จากนั้นย้ายตำแหน่งไปยัง upload
            $Users->save();
        }

        return redirect ('/'); //แสดงค่าที่หนัาหลัก
    }
    public function edit($id){
        $Users = User::find($id);
        return view('editpage',compact('Users'));
        //เก็บค่าที่เรากรอกเข้าไปใหม่ ในหน้า editpage ลงใน Users
    }
    public function update(Request $request, $id){
        $Users = User::find($id);

        $Users->name = $request->input('title');
        $Users->name = $request->input('name');
        $Users->email = $request->input('email');
        $Users->avatar = $request->input('avatar');
        //// request จะเก็บค่าของตัวแปรต่างๆ แล้วจะถูก input ออกมาตามลำดับ
        $Users->save();

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = $Users->id.'.'.$extension;
            $file->move('uploads/',$filename);
            $Users->avatar = $filename;
            //เหมือนกับอันที่แล้ว
            $Users->save();
        }
        return redirect('/');//แสดงค่าที่หนัาหลัก
    }
    public function destroy($id){
        $Users = User::find($id);
        $Users->delete();
        //เป็นการลบโดยจะหา ตำแหน่งที่ตรงกับ id ที่จะลบแล้วก็ทำการลบ

        return response()->json(['success' => true]);
        //เมื่อทำทุกอย่างแล้ว จะคือค่า value ของ success เป็น true
    }

}
