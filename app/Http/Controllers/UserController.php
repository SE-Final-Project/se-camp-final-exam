<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Title;

class UserController extends Controller
{
    public function index()
    {
        //Get users data from the database and send data to homepage 65160244 Audomsuk
        $users_data = User::orderBy('id', 'asc')->paginate(5);
        return view('homepage', compact('users_data'));
    }
    
    public function create()
    {
        // Return form for creating a new user 65160244 Audomsuk
        $titles = Title::orderBy('id', 'asc')->get();
        return view('addpage', compact('titles'));
    }

    public function store(Request $request)
    {
        //  Validate input fields  65160244 Audomsuk
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'title_id' => 'required',
        ]);

        //  Create a new user and save it in the database 65160244 Audomsuk
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->title_id = $request->title_id;
        $user->save();

        // Redirect to home page 65160244 Audomsuk
        return redirect()->route('user.index')->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        // Get titles and show title id in edit dropdown menu 65160244 Audomsuk
        $titles = Title::orderBy('id', 'asc')->get();
        return view('editpage', compact('user', 'titles'));
    }

    //  Update an existing user in the database 65160244 Audomsuk
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'required',
            'title_id' => 'required',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->title_id = $request->title_id;
        $user->save();

        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        // delete user data in database 65160244 Audomsuk
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}