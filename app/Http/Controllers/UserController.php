<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['users'] = User::with('title')->get();
        return view('homepage', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title['titles'] = Title::all();
        return view('addpage', $title);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $title_id = $request->input('title_id');
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $user = new User();
        $user->title_id = $title_id;
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->store('public/avatars');
        }
        $user->save();
        return Redirect::to('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = User::find($id);
        $titles = Title::all();
        return view('editpage', compact('user', 'titles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $title_id = $request->input('title_id');
        $name = $request->input('name');
        $email = $request->input('email');

        $user = User::find($id);
        $user->title_id = $title_id;
        $user->name = $name;
        $user->email = $email;
        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->store('public/avatars');
        }
        $user->save();
        return Redirect::to('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
