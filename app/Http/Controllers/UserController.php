<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
   public function index()
{
    $users = User::all();
    return view('homepage', compact('users'));
}

    public function showAddForm()
    {
        return view('addpage');
    }

    public function showEditForm($id)
    {
        $user = User::findOrFail($id);
        return view('editpage', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
        } else {
            $imageName = null;
        }

        // Create new user instance
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->title = $request->title; // Assign the title value
        $user->avatar = $imageName;
        $user->save();
        return redirect()->route('home')->with('success', 'User added successfully!');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|min:8',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $user->avatar = $path;
        }

        $user->save();

        return redirect()->route('home')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('home')->with('success', 'User deleted successfully');
    }
    public function uploadImage(Request $request)
    {

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');

            $image = new Image();
            $image->url = $path;
            $image->save();
        }

        return back()->with('success', 'Image uploaded successfully');
    }
}




// 65160231 พงศ์พิสูทธิ์ เคนชาติ SE
