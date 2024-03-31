<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Title;

class UserController extends Controller
{
    public function index()
    {
        $User = User::all();
        $Title = Title::all();
        return view('homepage', compact('User','Title'));
    }
    public function view_adduser()
    {
        return view('addpage');
    }
    public function keep(Request $request)
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'title_id' => $request->input('title_id'),
            'avatar' => $request->input('avatar')

        ]);
        return redirect('/');
    }
    public function addUser()
    {
        $Title = Title::all();
        return view('addpage', compact('Title'));
    }
    public function editUser($id)
    {
        $User = User::find($id);
        $Title = Title::all();
        return view('editpage', compact('Title','User'));
    }
    public function destroyUser($id)
    {
        $data = User::find($id);
        $data->delete();
        return Redirect::to('/');

    }
    public function updateUser(Request $request, $id)
    {
        $data = User::find($id);
        $data->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'title_id' => $request->input('title_id'),
            'avatar' => $request->input('avatar')
        ]);
        return redirect('/');
    }
}
