<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Title;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class userController extends Controller
{
 //65160108 นาย ปุณณะวิชญ์ เชียนพลแสน :) //65160108 นาย ปุณณะวิชญ์ เชียนพลแสน :)
     //65160108 นาย ปุณณะวิชญ์ เชียนพลแสน :) //65160108 นาย ปุณณะวิชญ์ เชียนพลแสน :)
    public function index() //จัดการตัวแปรและการส่งค่า
    {
        $data['data'] = User::all();
        $data['data_title'] = Title::all();
        return view("homepage",$data);
    }

    //65160108 นาย ปุณณะวิชญ์ เชียนพลแสน :)
    public function create()
    {
        $data['data_title'] = Title::all();//ในส่วนของการทำหน้า add
        return view("addpage",$data);
    }

    public function edit()
    {
        $data['data_title'] = Title::all();//ในส่วนของการทำหน้า edit
        return view("editpage",$data);
        
    } //65160108 นาย ปุณณะวิชญ์ เชียนพลแสน :)
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //65160108 นาย ปุณณะวิชญ์ เชียนพลแสน :)
        $name = $request -> input("name");
        $email = $request -> input("email"); //ส่งข้อมูลต่างๆที่รับเข้ามา
        $password = $request -> input("password");
        $avatar = $request -> file("avatar") -> store('public/image');
        $title = $request -> input("title");
        
        $send_data = new User();

        $send_data -> name = $name;
        $send_data -> email = $email;
        $send_data -> password = $password; //จับโยนออกไปที่ตัว homepage เพราะมีคนรอรับอยู่ที่ homepage
        $send_data -> avatar = str_replace('public','storage',$avatar) ;
        $send_data -> title_id = $title;
        $send_data->save();
 //65160108 นาย ปุณณะวิชญ์ เชียนพลแสน :)
        return Redirect::to("/");
    }

    
    public function update(Request $request , User $data)
 //65160108 นาย ปุณณะวิชญ์ เชียนพลแสน :)
    {
     
        $name = $request -> input("name");
        $email = $request -> input("email"); //ส่งข้อมูลต่างๆที่รับเข้ามา
        $password = $request -> input("password");
        $avatar = $request -> file("avatar") -> store('public/image');
        $title = $request -> input("title");
    
     $send_data = new User();

     $send_data -> name = $name;
     $send_data -> email = $email;
     $send_data -> password = $password; //จับโยนออกไปที่ตัว homepage เพราะมีคนรอรับอยู่ที่ homepage
     $send_data -> avatar = str_replace('public','storage',$avatar) ;
     $send_data -> title_id = $title;
     $send_data->save();
        return redirect()->route('/')->with ('finish','Its done bro.' );
        
 //65160108 นาย ปุณณะวิชญ์ เชียนพลแสน :)
    }
    public function destroy(User $data)
    {
        $data->delete(); //ลบ
        unlink($datas -> avatar);//ตัดการเชื่อมต่อกับรูปภาพเพื่อลบ
        return redirect()->route('/')->with ('finish','Its done bro.' );
        //65160108 นาย ปุณณะวิชญ์ เชียนพลแสน :)
}
}