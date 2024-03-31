<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Title;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('title')->get();
        return view('homepage',['users' => $users]);
    }

    public function viewAddPage(){
        $titles = Title::all();
        return view('addpage', compact('titles'));
    }

    public function addUser(Request $request){
    $request->validate([
        'title_id' => 'required',
        'name'=> 'required|max:50',
        'email' => 'required',
        'password' => 'required|min:8',
        'avatar' => 'nullable',
    ]);

    $validatedInput = $request->all();

    if($request->hasFile('avatar')){
        $avatar = $request->file('avatar');
        $avatarFilePath = $avatar->store('public/avatar');
        $validatedInput['avatar'] = basename($avatarFilePath);
    }

    $validatedInput['password'] = bcrypt($validatedInput['password']);
    $user = new User($validatedInput);
    $user->save();
    return redirect()->route('homepage')->with('success','Add User successfully');
}

    // public function addUser(Request $request)
    // {
    //     $request->validate([
    //         'title_id' => 'required',
    //         'name'=> 'required|max:50',
    //         'email' => 'required',
    //         'password' => 'required|min:8',
    //         'avatar' => 'nullable',
    //     ]);

    //     if($request->hasFile('avatar')){
    //         $avatar = $request->file('avatar');
    //         $avatarFilePath = $avatar->store('public/avatar');
    //         $validatedInput['avatar'] = basename($avatarFilePath);
    //     }

    //     $validatedInput['password'] = bcrypt($validatedInput['password']);
    //     $user = new User($validatedInput);
    //     $user->save();
    //     return redirect()->route('/homepage')->with('success','Add User successfully');
    // }

    public function updateUser(Request $request, $id){
        $request->validate([
            'title_id' => 'required',
            'name'=> 'required|max:50',
            'email' => 'required',
            'password' => 'required|min:8',
            'avatar' => 'nullable',
        ]);

        $user = User::findOrFail($id);

        if($request->hasFile('avatar')){
            $avater = $request->file('avatar');
            $avatarFilePath = $avater->store('public/avatar');
            $validatedInput['avatar'] = basename($avatarFilePath);
        }

        if($request->filled('password')){
            $validatedInput['password'] = bcrypt($validatedInput['password']);
        }
        else{
            unset($validatedInput['password']);
        }

        if($request->isMethod('PUT')){
            $user->update($validatedInput);
            return redirect()->route('/homepage')->with('success', 'Update User successfully');
        }
    }
}
