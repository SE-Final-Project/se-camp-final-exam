<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Title;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\alert;

class UserController extends Controller
{
    public function showHomePage()
    {
        $users = User::all();

        return view('homepage', ['users' => $users]);
    }

    public function showAddPage()
    {
        $titles = Title::orderBy('id')->get();

        return view('addpage', ['titles' => $titles]);
    }

    public function showEditPage($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('homepage')->with('error', 'User not found.');
        }
        $titles = Title::all();
        return view('editpage', compact('user', 'titles'));
    }


    public function storeUser(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'avatar' => 'image',
        ]);


        $user = new User();
        $title_name = $request->input('title');
        $title = Title::where('tit_name', $title_name)->first();
        if ($title) {
            $user->title_id =  $title->id;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        //image
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

        $validatedData = $request->validate([
            'title' => 'required',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|min:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);


        $user = User::findOrFail($id);
        $title_name = $request->input('title');
        $title = Title::where('tit_name', $title_name)->first();
        if ($title) {
            $user->title_id =  $title->id;
        }

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
            if ($request->filled('password')) {
            $user->password = bcrypt($validatedData['password']);
            }

        if ($request->hasFile('avatar')) {
            $fileName = time().$request->file('avatar')->getClientOriginalName();
            $avatarPath = $request->file('avatar')->storeAs('avatars',$fileName,'public');
            $user->avatar = '/storage/'.$avatarPath;
        } else{

            $user -> avatar = null;
        }
        $user->save();


        return redirect()->route('homepage')->with('success', 'User updated successfully!');
    }

    public function deleteUser($id)
    {
    $user = User::findOrFail($id);

    $user->delete();

    //กลับหน้าHomepage
    return redirect()->route('homepage')->with('success', 'User deleted successfully.');
    }
}