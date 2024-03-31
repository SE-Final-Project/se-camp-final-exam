<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $items = User::all();
        return view('homepage', compact('items'));
    }

    public function create()
    {
        return view('addpage');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $avatarName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('avatars'), $avatarName);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'avatar' => isset($avatarName) ? $avatarName : null,
        ]);

        return redirect('/')->with('success', 'เพิ่มข้อมูลผู้ใช้เรียบร้อยแล้ว');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('editpage', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/')->with('success', 'ลบข้อมูลผู้ใช้เรียบร้อยแล้ว');
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $user = User::find($id);

    if ($request->hasFile('avatar')) {
        $avatarName = time() . '.' . $request->avatar->extension();
        $request->avatar->move(public_path('avatars'), $avatarName);
        $user->avatar = $avatarName;
    }

    $user->name = $request->name;
    $user->email = $request->email;
    $user->save();

    return redirect('/')->with('success', 'อัปเดตข้อมูลผู้ใช้เรียบร้อยแล้ว');
}

}
