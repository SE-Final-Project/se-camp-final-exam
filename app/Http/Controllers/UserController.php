<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Title;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showHomePage()
    {
        // Retrieve data from the database
        $users = User::all();
        
        // Return to the homepage view
        return view('homepage', ['users' => $users]);
    }

    public function showAddPage()
    {
        $titles = Title::orderBy('id')->get();

        return view('addpage', ['titles' => $titles]);
    }

    public function showEditPage($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('homepage')->with('error', 'User not found.');
        }
        $titles = Title::all();
        return view('editpage', compact('user', 'titles'));
    }

    public function storeUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_id' => 'required|exists:titles,id',
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->title_id = $request->title_id; //ใส่ค่าลงในฐานข้อมูล
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); //สร้างความปลอดภัยในการเก็บรหัส

        //รับรูป
        if ($request->hasFile('avatar')) {
            $fileName = time().$request->file('avatar')->getClientOriginalName();
            $avatarPath = $request->file('avatar')->storeAs('avatars', $fileName, 'public');
            $user->avatar = '/storage/'.$avatarPath;
        } else {
            $user->avatar = '';
        }
        $user->save();

        return redirect()->route('homepage')->with('success', 'User added successfully!');
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            "title"=> "required",
            "name"=> "required",
            "email"=> "required",
            "password"=> "required",
        ]);

        $user = User::findOrFail($id);
        $user->title_id = $request->title;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        if ($request->hasFile('avatar')) {
            $fileName = time().$request->file('avatar')->getClientOriginalName();
            $avatarPath = $request->file('avatar')->storeAs('avatars', $fileName, 'public');
            $user->avatar = '/storage/'.$avatarPath;
        } else {
             //หากไม่มีการใส่ให้เป็น null
            $user->avatar = null;
        }

        $user->save();

        return redirect()->route('homepage')->with('success', 'User updated successfully!');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        
        $user->delete();
        
        // Redirect to the homepage
        return redirect()->route('homepage')->with('success', 'User deleted successfully.');
    }
}
