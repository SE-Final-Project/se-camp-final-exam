<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Title;


class UserController extends Controller
{
    /*
    65160241 Amonpan Noicharoen
    Create a controller for configuring and sending pages.
    */
    public function home_data()
    {
        $user_data = User::all();
        $title_data = Title::all();
        return view("homepage", ['users' => $user_data, 'titles' => $title_data]);
    }
    public function edit($id)
    {
        $user_data = User::find($id);
        return view('editpage', ['users' => $user_data]);
    }
    public function update(Request $request, $id)
    {
        $title_name = Title::find($id);
        $user_data = User::find($id);
        // $title_name = request('title');
        $user_data = request('input-title');
        $user_data->name = request('input-name');
        $user_data->email = request('input-email');
        $user_data->avatar = request('input-avatar');
        if (
            $request->hasFile('input-avatar')
        ) {
            $image = $request->file('input-avatar');
            $path = public_path() . '/image/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $user_data->avatar = '/image/' . $filename;
        }
        $user_data->save();
        return redirect('/');
    }
    public function delete($id)
    {
        $user_data = User::find($id);
        $user_data->delete();
        return back();
    }
    public function insert(Request $request)
    {

        $user_data = new User;
        $user_data->title_id = request('input-title');
        $user_data->name = request('input-name');
        $user_data->email = request('input-email');
        $user_data->password = request('input-password');
        $user_data->avatar = request('input-avatar');
        if (
            $request->hasFile('input-avatar')
        ) {
            $image = $request->file('input-avatar');
            $path = public_path() . '/image/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $user_data->avatar = '/image/' . $filename;
        }
        $user_data->save();
        return redirect('/');
    }
    public function add()
    {
        $tit_data = Title::query()->orderBy('tit_name', 'ASC')->get();
        return view('addpage', ['titles' => $tit_data]);
    }
}
