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
        $date_vali = $req->validate([
            // กรอกข้อมูลจำเป็น
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'avatar' => 'nullable',
            'title_id' => 'required',
        ]);

        if ($req->hasFile('avatar')) {
            $Avatar = $req->file('avatar');
            $avatarPath = $Avatar->store('public/avatars');
            $date_vali['avatar'] = basename($avatarPath);
        }

        $date_vali['password'] = bcrypt($date_vali['password']);

        $user = new User($date_vali);
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
        $date_vali = $request->validate([
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
            $date_vali['avatar'] = basename($avatarPath);
        }

        if ($request->isMethod('PUT')) {
            $user->update($date_vali);
            return redirect()->route('home');
        }
    }
}
