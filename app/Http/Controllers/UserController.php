<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Title;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * 65160209 Kusama Naewdong
     */

    // 65160209 กุสมา show data on homepage
    public function index()
    {
        //
        $user_view = User::all();
        return view('homepage', compact('user_view'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    //  65160209 กุสมา save data to database
    public function store(Request $request)
    {
        //
        $user = new User();
        $user->name = $request->db_name;
        $user->email = $request->db_email;
        // $user->password = $request->db_password;
        $user->avatar = $request->db_avatar ?: "ไม่มีรูป";
        $user->title = $request->db_title;

        $user->save();

        return Redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    //  65160209 กุสมา show data can edit
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $titles = Title::all();

        return view('editpage', compact('user', 'titles'));
    }
    //  65160209 กุสมา update data to database
    public function updateUser(Request $request, $id)
    {
        $validatedData = $request->validate([
            'db_name' => 'required', // Update the field names to match the form
            'db_email' => 'required|unique:users,email,' . $id,
            'password' => 'nullable',
            'db_avatar' => 'nullable|image',
            'db_title' => 'required',
        ]);

        $user = User::findOrFail($id);

        if ($request->hasFile('db_avatar')) {
            $avatar = $request->file('db_avatar');
            $avatarPath = $avatar->store('public/avatars');
            $validatedData['avatar'] = basename($avatarPath);
        }

        if ($request->isMethod('PUT')) {
            $user->update($validatedData);
            return Redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    //  65160209 กุสมา delete data to database
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/')->with('success', 'User deleted successfully.');
    }
}
