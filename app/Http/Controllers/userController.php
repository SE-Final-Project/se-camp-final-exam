<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Title;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//natapohn 65160218

class userController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('homepage', compact('users'));
    }

    public function addpage()
    {
        return view('addpage');
    }

    public function insert(Request $request)
    {
        $title = $request->input('title');
        $name = $request->input('name');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $avatar = $request->file('avatar');

        $title = Title::firstOrCreate(['tit_name' => $title]);

        $user = new User;
        $user->title_id = $title->id;
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;

        //upload avatar
        if ($request->hasFile('avatar')) {
            $avatarPath = $avatar->store('public/avatars');
            $user->avatar = 'storage/' . str_replace('public/', '', $avatarPath); // Adjust the path to the storage directory
        }
        $user->save();
        return redirect('/');
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $titles = Title::all();

        return view('editpage', compact('user', 'titles'));
    }

    public function update(Request $request, string $id)
    {
        $titleId = $request->input('title');
        $name = $request->input('name');
        $email = $request->input('email');

        $user = User::findOrFail($id);
        $user->title_id = $titleId;
        $user->name = $name;
        $user->email = $email;

        //update avatar
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar'); // Retrieve the avatar file from the request
            $avatarPath = $avatar->store('public/avatars');
            $user->avatar = 'storage/' . str_replace('public/', '', $avatarPath); // Adjust the path to the storage directory
        }
        $user->save();
        return redirect('/');
    }


    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/')->with('success', 'User deleted successfully.');
    }
}
