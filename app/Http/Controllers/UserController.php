<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Title;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

/**
 * 65160208 kittipoom yutanava
 */
class UserController extends Controller
{

    public function index()
    {
        //
        $user_list = User::all();
        return view('homepage', compact('user_list'));
    }

    public function addpage()
    {
        return view('addpage');
    }

    // สร้างฟังก์ชันสร้าง User
    public function create(Request $request)
    {
        //สร้างตัวแปรมาเก็บข้อมูลในฟอร์ม
        $title = $request->input('title');
        $name = $request->input('name');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $avatar = $request->file('avatar');

        $title = Title::firstOrCreate(['tit_name' => $title]);

        // สร้าง model ของ User ในการเก็บตัวแปรที่รับมา
        $user = new User;
        $user->title_id = $title->id;
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $avatarPath = $avatar;
        $user->avatar = $avatarPath;

        // ถ้ามีการแนบรูปภาพมา
        if ($avatar) {
            $avatarPath = $avatar->store('public/avatars');
            $avatarPath = str_replace("public", "storage", $avatarPath);
            $user->avatar = $avatarPath;
        }
        $user->save();


        // dd($avatarPath);
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    // ฟังก์ชั้นของหน้า edit
    public function edit(string $id)
    {
        //65160208 kittipoom
        // หาข้อมูลของ User ที่ตรงกับ $id มาเก็บในตัวแปร $user
        $user = User::findOrFail($id);
        // นำข้อมูลทั้งหมดใน title มาเก็บในตัวแปร $titles
        $titles = Title::all();

        // ให้แสดงหน้า view ของ editpage.blade.php โดยส่ง ตัวแปร user กับ titles ไปด้วย
        return view('editpage', compact('user', 'titles'));
        // dd($user->title_id);
        // dd($titles , $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //ผมขี้เกียจ comment แล้วครับอาจารย์ 65160208 กิตติภูมิ
        $titleId = $request->input('title');
        $name = $request->input('name');
        $email = $request->input('email');

        $user = User::findOrFail($id);
        $user->title_id = $titleId;
        $user->name = $name;
        $user->email = $email;
        $user->save();
        // dd($title, $name, $email);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/')->with('success', 'User deleted successfully.');
    }
}
