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

    //show hompage 65160360 sirichai paenpiriya
    public function HomePage()
    {
        $users = User::all();
        return view('homepage', ['users' => $users]);
    }
    //show add page 65160360 sirichai paenpiriya
    public function Create()
    {
        $titles = Title::orderBy('id')->get();
        return view('addpage', ['titles' => $titles]);
    }
    //show add edit page 65160360 sirichai paenpiriya
    public function showEdit($id)
    {
        $user = User::find($id);
        $titles = Title::all();
        return view('editpage', compact('user', 'titles'));
    }

    //store data 65160360 sirichai paenpiriya
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title_id' => 'required',
            'name' => 'required',
            'email' => 'required',//can 1 mail unique
            'password' => 'required',
            'avatar' => 'image',
        ]);
        $user = new User();
        $user->title_id = $request->title_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        //เช็คไฟล์ภาพ
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

    //update data 65160360 sirichai paenpiriya
    public function updateUser(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'title_id' => 'required',
            'name' => 'required',
            'email' => 'required',//can 1 mail unique
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
        //เช็คไฟล์ภาพ
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
    //delete data 65160360 sirichai paenpiriya

    public function deleteUser($id)
    {
    $users = User::findOrFail($id);
    $users->delete();
    return redirect()->route('homepage')->with('success', 'User has been deleted successfully.');
    }



}
