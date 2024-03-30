<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
       $user = User::all();
       return view ('homepage')->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('addpage');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $avatar = $request->file('avatar');

    // เพิ่มเติม: ตรวจสอบข้อมูลและจัดการ error
        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = bcrypt($password);
        if ($request->hasFile('avatar')) {
            $fileName = $avatar->getClientOriginalName();
            $avatarPath = $avatar->storeAs('avatars', $fileName);
            $user->avatar = $avatarPath;
        }
        $user->save();
        return redirect('')->with('flash_message', 'User Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('homepage')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('editpage')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $input = $request->all();
        $user->update($input);
        return redirect('user')->with('flash_message', 'User Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect('user')->with('flash_message', 'User deleted!');
    }
}
