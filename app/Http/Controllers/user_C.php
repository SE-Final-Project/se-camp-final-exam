<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class user_C extends Controller
{
    function user()
    {
       $users = DB::table('users')->get();
       return view('homepage',compact('users'));
    }

    function add()
    {
        return view('addpage');
    }

    // function insert(Request $request)
    // { //เพิ่ม
    //     $request->validate(
    //         [
    //             'name' => 'required | max:50',
    //         ],
    //         [
    //             'name.required' => 'กรุณาป้อมชื่อของคุณ',
    //             'name.max' => 'ชื่อของคุณไม่ควรเกิน 50 ตัวอักษร',
    //         ]
    //     );
    //     $data = ['name' => $request->name];
    //     DB::table('uesr')->insert($data);
    //     return redirect('/user');
    // }
    // function delete($id)
    // { //ลบ
    //     DB::table('uesr')->where('id', $id)->delete();
    //     return redirect('/user');
    // }

    // function edit($id){
    //     $user = DB::table('uesr')->where('id',$id)->first();
    //     return view('edit', compact('user'));
    // }



    // function update(Request $request, $id)
    // {
    //     $request->validate(
    //         [
    //             'name' => 'required | max:50',
    //         ],
    //         [
    //             'name.required' => 'กรุณาป้อมชื่อของคุณ',
    //             'name.max' => 'ชื่อของคุณไม่ควรเกิน 50 ตัวอักษร',
    //         ]
    //     );
    //     $data = ['name' => $request->name];
    //     DB::table('uesr')->where('id', $id)->update($data);
    //     return redirect('/user');
    // }
}
