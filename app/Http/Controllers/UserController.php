<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Title;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('title')->get();
        return view('homepage', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('User.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request -> validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'title_id' => 'required|exists:titles,id',
            'avatar' => 'nullable|image|max:10000',
        ]);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarPath = $avatar->store('public/avatars');
            $validatedData['avatar'] = basename($avatarPath);
        }

        $users = new User($validatedData);
        $users->save();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $titles = Title::all();
        return view('addpage', compact('titles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $titles = Title::all();
        return view('editpage', compact('user','titles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request -> validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'title_id' => 'required|exists:titles,id',
            'avatar' => 'nullable|image|max:10000',
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('home');
    }
}
}
