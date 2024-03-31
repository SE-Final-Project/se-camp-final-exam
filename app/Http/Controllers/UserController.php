<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Title;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('homepage', ['users' => $users]);
    }

    public function showAddForm()
    {
        $titles = Title::orderBy('tit_order', 'ASC')->get();
        return view('addpage', compact('titles'));
    }

    public function showEditForm($id)
    {
        return view('editpage');
    }

    public function showUpdateAddForm(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'title_id' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        // Create a new User instance
        $user = new User();
        $user->title_id = $request->title_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Hash password

        // Upload avatar if exists
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('public/avatars', $avatarName); // Store avatar in storage
            $user->avatar = $avatarName;
        }

        $user->save();

        return redirect('/')->with('success', 'User added successfully!');
    }

    public function showUpdateEditForm(Request $request, $id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Validate the request data
        $request->validate([
            'title_id' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        // Update user data
        $user->title_id = $request->title_id;
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password); // Hash new password if provided
        }
        // Upload new avatar if exists
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('public/avatars', $avatarName); // Store avatar in storage
            $user->avatar = $avatarName;
        }
        $user->save();

        return redirect('/')->with('success', 'User updated successfully!');
    }

    public function showDeleteForm($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Delete the user
        $user->delete();

        return redirect('/')->with('success', 'User deleted successfully!');
    }
}
