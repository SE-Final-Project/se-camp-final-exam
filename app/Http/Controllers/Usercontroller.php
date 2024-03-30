<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Title;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    /**
     * 65160233
     * นายภาณุวิชญ์ จันทร์กลาง
     *
     */
    public function index()
    {
        $users = User::with('title')->get();

        return view('homepage', ['users' => $users]);
    }
    /**
     * 65160233
     * นายภาณุวิชญ์ จันทร์กลาง
     *
     * เก็บค่าที่user เพิ่มลง database
     */
   // ...

public function addUser(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:5',
        'avatar' => 'nullable|image|max:2048',
        'title_id' => 'required|exists:titles,id',
    ]);

    // เก็บรูปใน public/avatars ใช้ php artisan storage:link
    if ($request->hasFile('avatar')) {
        $avatar = $request->file('avatar');
        $avatarPath = $avatar->store('public/avatars');
        $validatedData['avatar'] = basename($avatarPath);
    }

    // Hash the password
    $validatedData['password'] = bcrypt($validatedData['password']);

    // เพิ่มลง DB
    $user = new User($validatedData);
    $user->save();


    return redirect()->route('home')->with('success', 'User added successfully!');
}
public function showAddPage()
{
    $titles = Title::all();
    return view('addpage', compact('titles'));
}

public function deleteUser($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return response()->json(['message' => 'User deleted successfully']);
}
public function editUser($id)
{
    $user = User::findOrFail($id);
    $titles = Title::all();

    return view('editpage', compact('user', 'titles'));
}
public function updateUser(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|min:5',
        'avatar' => 'nullable|image|max:2048',
        'title_id' => 'required|exists:titles,id',
    ]);

    $user = User::findOrFail($id);

    if ($request->hasFile('avatar')) {
        $avatar = $request->file('avatar');
        $avatarPath = $avatar->store('public/avatars');
        $validatedData['avatar'] = basename($avatarPath);
    }

    if ($request->filled('password')) {
        $validatedData['password'] = bcrypt($validatedData['password']);
    } else {
        unset($validatedData['password']);
    }
    if ($request->isMethod('PUT')) {

        $user->update($validatedData);
        return redirect()->route('home')->with('success', 'User updated successfully!');
}
}
}
