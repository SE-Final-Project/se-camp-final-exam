<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Title;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\alert;

class UserController extends Controller
{
    public function showHomePage()
    {
        // Fetch user data from the database
        $users = User::all();
        
        // Return the view with user data
        return view('homepage', ['users' => $users]);
    }

    public function showAddPage()
    {
        $titles = Title::all();
        // Return the view for adding a user
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
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation rule for avatar upload
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Process and store the user data
        $user = new User();
        $user->title = $request->title;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Hash the password for security
        // Handle avatar upload if applicable
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars');
            $user->avatar = $avatarPath;
        }
        $user->save();
    
        // Redirect the user after successful submission
        return redirect()->route('homepage')->with('success', 'User added successfully!');
    }
    

    public function updateUser(Request $request, $id){
    // Validate the form data
    $validatedData = $request->validate([
        'title' => 'required',
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email,'.$id,
        'password' => 'nullable|min:6', // Allow password to be nullable
        'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation rule for avatar upload
    ]);

    // Find the user by ID
    $user = User::findOrFail($id);

    // Update the user data
    $user->title = $validatedData['title'];
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    if ($request->filled('password')) {
        $user->password = bcrypt($validatedData['password']); // Hash the password for security
    }
    // Handle avatar upload if applicable
    if ($request->hasFile('avatar')) {
        $avatarPath = $request->file('avatar')->store('avatars');
        $user->avatar = $avatarPath;
    }
    $user->save();

    // Redirect the user after successful update
    return redirect()->route('homepage')->with('success', 'User updated successfully!');
    }

    public function deleteUser($id)
    {
    // Find the user by ID
    $user = User::findOrFail($id);
    
    // Delete the user
    $user->delete();
    
    // Redirect back to the homepage with a success message
    return redirect()->route('homepage')->with('success', 'User deleted successfully.');
    }


    
}
