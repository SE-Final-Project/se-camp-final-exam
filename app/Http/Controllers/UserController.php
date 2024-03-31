<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Title;

class UserController extends Controller
{
    public function store(Request $request)
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'title_id' => $request->input('title_id'),
            'avatar' => $request->input('avatar'),

        ]);
        return redirect('/');
    }
    public function index()
    {
        $User = User::all(); // Get all user from database
        $Title = Title::all();
        return view('homepage', compact('User','Title')); //Pass item to the index view

    }
    public function addUser()
    {
        $Title = Title::all();
        return view('addpage', compact('Title')); //Pass item to the index view

    }
    public function editUser($id)
    {
        $User = User::find($id);
        $Title = Title::all();
        return view('editpage', compact('Title','User'));

    }
    public function update(Request $request,$id)
    {
        $User = User::find($id);
        $User->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),

            'title_id' => $request->input('title_id'),
            'avatar' => $request->input('avatar'),
        ]);
        return redirect('/');

    }

    public function delete($id)
    {
        $inputdata = User::find($id);
        $inputdata->delete();
        return redirect('/');
    }

}
