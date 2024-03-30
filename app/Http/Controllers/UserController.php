<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Title;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function index(){
        return view('homepage');
    }
    public function addUserPage(){
        $data['titles'] = Title::all();
        //sort by title
        $data['titles'] = $data['titles']->sortBy('tit_order');
        //sort by tit_order

        return view('addpage', $data);
    }

    public function addUser(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'email' => 'unique:users',
            'password' => 'required',
            'title' => 'required',

        ]);

        //adduser to database
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->title_id = $request->title;

        //file upload avatar
        // if($request->hasFile('avatar')){
        //     $file = $request->file('avatar');
        //     $ext = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$ext;
        //     // Storage::disk('local')->put($filename, file_get_contents($file));
        //     $user->avatar = $filename;
        // }

        $user->save();

        //go to homepage
        return redirect('/');
    }
    public function homePage(){
        $data['users'] = User::select('users.*', 'titles.tit_name')->join('titles', 'users.title_id', '=', 'titles.id')->get();
        return view('homepage', $data);
    }

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return Redirect::to('/');
    }

    public function editUserPage($id){
        $data['user'] = User::find($id);
        $data['titles'] = Title::all();
        return view('editpage', $data);
    }

    public function updateUser(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->title_id = $request->title;
        $user->save();
        return Redirect::to('/');

    }
}
