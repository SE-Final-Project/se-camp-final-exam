<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Title;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //65160092 ธนภัทร - ทำfuntion indexไว้ดึงข้อมูล กับแสดงหน้า homepage
    public function index()
    {
        $users = User::all();

        return view('homepage', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    //65160092 ธนภัทร - สร้าง funtion ไว้ แสดงหน้า add-user
    public function create()
    {
        //
        $titles = Title::orderBy('id')->get();

        return view('add-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    //65160092 ธนภัทร - ไว้ดึงข้อมูล
    public function store(Request $request)
    {
        //
        $request->validate([
        'title_id' => 'required',
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'avatar' => 'image',
        ]);

        $users = new user;
        $users -> tatle_id = $request->tatle_id;
        $users -> name = $request->name;
        $users -> email = $request->email;
        $users -> password = $request->password;
        $users -> avatar = $request->avatar;
        $users->save();
        return redirect()->route('homepage');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('editpage');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
