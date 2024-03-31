<?php

namespace App\Models\User;
namespace App\Models\Title;
namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class userscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       $data['titles'] = Title::all();
        $data['users'] = User::all(); //ดึงข้อมูลจากModel allคือการ getdataทั้งหมด
        return view('/homepage',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['titles'] = Title::all();
        $data['users'] = User::all();//ดึงข้อมูลจากModel allคือการ getdataทั้งหมด
        return view('addpage',$data);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $avatarPath = $request->file('avatar');
        $title_name = $request->input('title');
        $title = Title::where('tit_name', $title_name)->first();

        $User = new User;
        if ($title) {
            $User->title_id = $title->id;
        }

        $User->name = $name;
        $User->email = $email;
        $User->password = $password;
        $User->password = bcrypt($request->password);
        //image
        if ($request->hasFile('avatar')) {
            $fileName = time().$request->file('avatar')->getClientOriginalName();
            $avatarPath = $request->file('avatar')->storeAs('avatars',$fileName,'public');
            $User->avatar = '/storage/'.$avatarPath;
        }

            $User -> save();
        return Redirect::to('homepage');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $User = User::all();

        return view('homepage', ['users' => $User]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function showedit(String $id)
    {
        $User = User::find($id);
        $titles = Title::all();
        if (!$User) {
            return redirect()->route('homepage')->with('error', 'User not found.');
        }

        return view('editpage', compact('User', 'titles'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $avatarPath = $request->file('avatar');
        $title_name = $request->input('title');
        $title = Title::where('tit_name', $title_name)->first();

        $User = User::find($id);
        if ($title) {
            $User->title_id = $title->id;
        }

        $User->name = $name;
        $User->email = $email;
        $User->password = $password;
        $User->password = bcrypt($request->password);
        //image
        if ($request->hasFile('avatar')) {
            $fileName = time().$request->file('avatar')->getClientOriginalName();
            $avatarPath = $request->file('avatar')->storeAs('avatars',$fileName,'public');
            $User->avatar = '/storage/'.$avatarPath;
        }
            $User -> save();
        return Redirect::to('homepage');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $User = User::findOrFail($id);

        $User->delete();

        //กลับหน้าHomepage
        return redirect()->route('homepage')->with('success', 'User deleted successfully.');
        }

    }

