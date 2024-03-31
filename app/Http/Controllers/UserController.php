<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Title;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{//65160087 Kasama Soisuwan
    public function index()
    {
        $users = User::with('title')->get();
        return view('homepage',['users' => $users]);
    }

    public function viewAddPage(){//page add user
        $titles = Title::all();
        return view('addpage', compact('titles'));
    }
    public function addUser(Request $request){//add user
            $validatedInput = $request->validate([
        'title_id' => 'required',
        'name'=> 'required|max:50',//ไม่เกิน50ตัวอักษร
        'email' => 'required',
        'password' => 'required|min:8',//อย่างน้อย 8 9ตัว
        'avatar' => 'nullable',
    ]);
        if ($request->hasFile('avatar')) {//check pic
            $Avatar = $request->file('avatar');
            $avatarFilePath = $Avatar->store('public/avatars');
            $validatedInput['avatar'] = basename($avatarFilePath);
        }

        $validatedInput['password'] = bcrypt($validatedInput['password']);

        $user = new User($validatedInput);
        $user->save();

        return redirect()->route('homepage');
    }
    public function deleteUser($id){//delete user
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('homepage');
    }
    public function editUser($id) {//edit user
    $user = User::findOrFail($id);
    $titles = Title::all();

    return view('editpage', compact('user', 'titles'));
    }
    public function updateUser(Request $request, $id){//uddate user
        $validatedInput = $request->validate([
            'title_id' => 'required',
            'name'=> 'required|max:50',
            'email' => 'required|unique:users,email,' . $id,
            'avatar' => 'nullable',
        ]);

        $user = User::findOrFail($id);

        if ($request->hasFile('avatar')) {
            $Avatar = $request->file('avatar');
            $avatarFilePath = $Avatar->store('public/avatars');
            $validatedInput['avatar'] = basename($avatarFilePath);
        }

        if ($request->isMethod('PUT')) {
            $user->update($validatedInput);
            return redirect()->route('homepage');
        }

    }
}
