<?php

//namespace App\Http\Controllers;
//use App\Models\Title;
//use App\Models\User;
//use Illuminate\Http\Request;
//abstract class Controller
//{

    // Create Index
    // public function index() {
    //     // $data['titles'] = Title::orderBy('id', 'asc')->paginate(5);
    //     // $data['users'] = User::orderBy('id', 'asc')->paginate(5);
    //     // return view('homepage', $data);
    //     // $users = User::get();
    //     // $titles = Title::get();
    //     // return view('homepage',compact('users','titles'));
    //     echo "test";
    // }


    // // add resource
    // public function add() {
    //     return view('add-user');
    // }

    // // Store resource
    // public function store(Request $request) {
    //     $request->validate([
    //         'tit' => 'required',
    //         'name' => 'required',
    //         'email' => 'required',
    //         'password' => 'required',
    //         'avatar' => 'required'
    //     ]);

    //     $Title = new Title;
    //     $User = new User;
    //     $Title->tit = $request->tit;
    //     $User->name = $request->name;
    //     $User->email = $request->email;
    //     $User->password = $request->password;
    //     $User->avatar = $request->address;
    //     $Title->save();
    //     $User->save();
    //     return redirect()->route('homepage')->with('success', 'ADD successfully.');
    // }

    // public function edit(User $User) {
    //     return view('edit-user', compact('titles'));
    // }

    // public function update(Request $request, $id) {
    //     $request->validate([
    //         'tit' => 'required',
    //         'name' => 'required',
    //         'email' => 'required',
    //         'password' => 'required',
    //         'avatar' => 'required'
    //     ]);

    //     $users = new User;

    //     $users->name = $request->name;
    //     $users->email = $request->email;
    //     $users->password = $request->password;
    //     $users->avatar = $request->address;

    //     $users->save();
    //     return redirect()->route('homepage')->with('success', 'updated successfully.');
    // }

    // public function destroy(String $id) {
    //     $users = User::find($id);
    //     $users->delete();
    //     return redirect()->route('homepage')->with('success', 'deleted successfully.');
    // }

//} -->



namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
