<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Title;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'asc')->get();
        return view('homepage', compact('users'));
    }

    public function create()
    {
        $titles = Title::orderBy('id', 'asc')->get();
        return view('addpage', compact('titles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = new User;
        $user->title_id = $request->title;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        if ($request->hasFile("avatar")) {
            $file = $request->file("avatar");
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move("onload/user/", $filename);
            $user->avatar = $filename;
        }

        $user->save();

        return redirect()->route("user.index")->with("success", "User created successfully.");
    }

    public function edit(User $user)
    {
        $titles = Title::orderBy('id', 'asc')->get();
        return view("editpage", compact("user", "titles"));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            "title" => "required",
            "name" => "required",
            "email" => "required",
        ]);

        $user->title_id = $request->title;
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('onload/user/', $filename);
            $user->avatar = $filename;
        }

        $user->save();

        return redirect()->route("user.index")->with("success", "User updated successfully.");
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route("user.index")->with("success", "User deleted successfully.");
    }
}