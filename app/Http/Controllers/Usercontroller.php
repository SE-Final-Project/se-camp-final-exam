<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Title;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\alert;


class UserController extends Controller
{
    public function showHomePage()
    {
        $users = User::all();
        return view('homepage', ['users' => $users]);
    }

    public function Create()
    {
        $titles = Title::orderBy('id')->get();

        return view('addpage', ['titles' => $titles]);
    }

    public function showEdit($id)
    {
        $user = User::find($id);
        $titles = Title::all();
        return view('editpage', compact('user', 'titles'));
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'avatar' => 'image',
        ]);
        $title_name = $request->input('title');
        $title = Title::where('tit_name', $title_name)->first();
        if ($title) {
            $user->title_id =  $title->id;
        }
        $user = new User();
        $user->title_id = $request->title_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if ($request->hasFile('avatar')) {
            $fileName = time().$request->file('avatar')->getClientOriginalName();
            $avatarPath = $request->file('avatar')->storeAs('avatars',$fileName,'public');
            $user->avatar = '/storage/'.$avatarPath;
        } else{
            $user -> avatar = null;
        }
        $user->save();
        return redirect()->route('homepage')->with('success', 'User has been added successfully!');
    }

    public function updateUser(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'title_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'avatar' => 'image',
        ]);
        $user = User::find($id);
        $title_name = $request->input('title');
        $title = Title::where('tit_name', $title_name)->first();
        $user->title_id = $title ? $title->id : null;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if ($request->hasFile('avatar')) {
            $fileName = time().$request->file('avatar')->getClientOriginalName();
            $avatarPath = $request->file('avatar')->storeAs('avatars',$fileName,'public');
            $user->avatar = '/storage/'.$avatarPath;
        } else{
            $user -> avatar = null;
        }
        $user->save();


        return redirect()->route('homepage')->with('success','company has been updated successfully');
    }

    public function deleteUser($id)
    {
    $user = User::findOrFail($id);

    $user->delete();

    return redirect()->route('homepage')->with('success', 'User has been deleted successfully.');
    }



}
