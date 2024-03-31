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
     */
    public function index()
    {
        $user_list = User::paginate(10);
        return view('homepage', compact('user_list'));
    }

    public function addpage()
    {
        return view('addpage');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
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
        $avatarPath = $avatar;
        $user->avatar = $avatarPath;
        if ($avatar) {
            $avatarPath = $avatar->store('public/avatars');
            $avatarPath = str_replace("public", "storage", $avatarPath);
            $user->avatar = $avatarPath;
        }

        // dd($avatarPath);
        $user->save();
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        // dd($user->title_id);
        $titles = Title::all();
        // dd($titles , $user);
        return view('editpage', compact('user', 'titles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $titleId = $request->input('title');
        $name = $request->input('name');
        $email = $request->input('email');

        $user = User::findOrFail($id);
        $user->title_id = $titleId; 
        $user->name = $name;
        $user->email = $email;
        $user->save();
        // dd($title, $name, $email);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/')->with('success', 'User deleted successfully.');
    }
}
