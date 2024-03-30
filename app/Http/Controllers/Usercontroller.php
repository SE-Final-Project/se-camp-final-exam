<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Title;
use Illuminate\Http\Request;

class UserController extends Controller {
    
    public function id() {
        $users = User::with('title')->get();

        return view('homepage', ['users' => $users]);
    }

    public function addUser(Request $req) {
        $validatedData = $req->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'avatar' => 'nullable',
            'title_id' => 'required',
        ]);

        if ($req->hasFile('avatar')) {
            $Avatar = $req->file('avatar');
            $avatarPath = $Avatar->store('public/avatars');
            $validatedData['avatar'] = basename($avatarPath);
        }

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = new User($validatedData);
        $user->save();

        return redirect()->route('home');
    }

    public function showAddPage() {
        $titles = Title::all();
        return view('addpage', compact('titles'));
    }

    public function deleteUser($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('home');
    }

    public function editUser($id) {
        $user = User::findOrFail($id);
        $titles = Title::all();

        return view('editpage', compact('user', 'titles'));
    }

    public function updateUser(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'password' => 'nullable',
            'avatar' => 'nullable|image',
            'title_id' => 'required',
        ]);

        $user = User::findOrFail($id);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarPath = $avatar->store('public/avatars');
            $validatedData['avatar'] = basename($avatarPath);
        }

        if ($request->isMethod('PUT')) {
            $user->update($validatedData);
            return redirect()->route('home');
        }
    }
}    