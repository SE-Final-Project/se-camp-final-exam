<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\File;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function homePage() {
        return view('homepage');
    }
    public function addPage()
    {
        return view('addpage');
    }
    public function edit($id)
    {
        $m_user = User::findOrFail($id);
        $m_title = Title::findOrFail($id);

        return view('editpage', compact(['m_user', 'm_title']));
    }
    public function insert(Request $request)
    {
        $tit_name = $request->input('tit_name');
        $tit_order = 1;

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $m_user = new User();
        $m_title = new Title();

        $m_title->tit_name = $tit_name;
        $m_title->tit_order = $tit_order;

        $m_user->name = $name;
        $m_user->email = $email;
        $m_user->password = $password;
        if ($request->hasFile('avatar')) {
            $m_user->avatar = $request->file('avatar')->store('public/avatar');
        }
        // $m_user->avatar = $request->file('avatar')->store('public/avatar');

        $m_title->save();
        $m_user->save();
        return Redirect::to('/');
    }
    // Use for ajax
    public function user()
    {
        $user = User::all();
        return response()->json($user);
    }
     // Use for ajax
    public function title()
    {
        $title = Title::all();
        return response()->json($title);
    }
    public function update(Request $request, string $id)
    {
        $tit_name = $request->input('tit_name');
        $name = $request->input('name');
        $email= $request->input('email');
        $password= $request->input('password');

        $tit_order = 1;

        $m_title = Title::find($id);
        $m_user = User::find($id);

        $m_title->tit_name = $tit_name;
        $m_title->tit_order = $tit_order;

        $m_user->name = $name;
        $m_user->email = $email;
        $m_user->password = $password;
        if ($request->hasFile('avatar')) {
            $m_user->avatar = $request->file('avatar')->store('public/avatar');
        }


        $m_title->save();
        $m_user->save();

        return Redirect::to('/');
    }
    public function delete($id)
    {
        $m_user = User::find($id);
        $m_user->delete();

        $m_title = Title::find($id);
        $m_title->delete();
    }
}
