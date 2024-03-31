<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Title;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['users'] = User::all();
        $data['titles'] = Title::all();

        return view('homepage', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titles = Title::orderBy('id')->get();
        return view('addpage', ['titles' => $titles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        $title_name = $request->input('title');
        $title = Title::where('tit_name', $title_name)->first();

        $user = new User;

        if ($title) {
            $user->title_id = $title->id;
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        if ($request->hasFile('avatar')) {
            $fileName = time() . $request->file('avatar')->getClientOriginalName();
            $avatarPath = $request->file('avatar')->storeAs('avatars', $fileName, 'public');
            $user->avatar = '/storage/' . $avatarPath;
        }

        $user->save();

        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function showedit($id)
{
        $user = User::find($id);
        $titles = Title::all();
        if (!$user) {
            return redirect()->route('homepage')->with('error', 'User not found.');
        }
    return view('editpage', compact('user', 'titles'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        $title_name = $request->input('title');
        $title = Title::where('tit_name', $title_name)->first();

        $user = User::find($id);

        if ($title) {
            $user->title_id = $title->id;
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');


        if ($request->hasFile('avatar')) {
            $fileName = time() . $request->file('avatar')->getClientOriginalName();
            $avatarPath = $request->file('avatar')->storeAs('avatars', $fileName, 'public');
            $user->avatar = '/storage/' . $avatarPath;
        }

        $user->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/');
    }
}
