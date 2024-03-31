<?php

namespace App\Models\User;
namespace App\Models\Title;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Title;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\exam_se_camp;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['users'] = User::all(); //ดึงข้อมูล

        return view('homepage',$data);



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title =Title::orderBy('id')->get();
        return view('addpage',['titles'=>$title]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $title_name = $request->input('title');
        $title = Title::where('tit_name', $title_name)->first();

        $user = new User;

        if ($title) {
            $user->title_id = $title->id;
        }

        $user->name = $name;
        $user->email = $email;
        $user->password = $password;


        $user->title_id = $title->id;
        if ($request->hasFile('avatar')) {
            $fileName = time().$request->file('avatar')->getClientOriginalName();
            $avatarPath = $request->file('avatar')->storeAs('avatars',$fileName,'public');
            $user->avatar = '/storage/'.$avatarPath;
        } else{
            $user -> avatar = null;
        }

        $user->save();


        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $titles = Title::all(); // Assuming you have a Title model
        return view('users.edit', compact('user', 'titles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $title_name = $request->input('title');
        $title = Title::where('tit_name', $title_name)->first();

        $user = User::find($id);


        if ($title) {
            $user->title_id = $title->id;
        }

        $user->name = $name;
        $user->email = $email;
        $user->password = $password;



        $user->title_id = $title->id;
        if ($request->hasFile('avatar')) {
            $fileName = time().$request->file('avatar')->getClientOriginalName();
            $avatarPath = $request->file('avatar')->storeAs('avatars',$fileName,'public');
            $user->avatar = '/storage/'.$avatarPath;
        } else{
            $user -> avatar = null;
        }

        $user->save();


        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $users = User::findOrFail($id);

        $users->delete();

        return redirect('/');
    }
}
