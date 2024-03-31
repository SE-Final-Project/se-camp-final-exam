<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class user_C extends Controller
{
    function user()
    {
        $users = User::all();
       return view('homepage', compact('users'));
    }

    function add()
    {
        return view('addpage');
    }

    function insert(Request $request)
    { //เพิ่ม
        $data = ['name' => $request->name];
        DB::table('uesrs')->insert($data);
        return redirect('/homepage');
    }
    function delete($id)
    { //ลบ
        DB::table('uesrs')->where('id', $id)->delete();
        return redirect('/homepage');
    }

    function edit($id){
        $user = DB::table('uesrs')->where('id',$id)->first();
        return view('editpage', compact('user'));
    }



    function update(Request $request, $id)
    {
        $data = ['name' => $request->name];
        DB::table('uesrs')->where('id', $id)->update($data);
        return redirect('/homepage');
    }
}
