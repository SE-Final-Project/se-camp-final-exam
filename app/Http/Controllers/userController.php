<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        return view('homepage',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_index()
    {
        $titles=Title::OrderBy('tit_order')->get();
        return view('addpage',compact('titles'));
    }
    public function create(Request $request)
    {
        $name=$request['name'];
        $title_id=$request['title_id'];
        $email=$request['email'];
        $password=$request['password'];
        //dd($name,$title_id,$email,$password);
        $avatar_name="";
        if ($avatar=$request->file('file')){
            $avatar_name=$avatar->getClientOriginalName();
            $avatar->move('images/uploads',$avatar_name);
        }
        User::create([
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'title_id'=>$title_id,
            'avatar'=>$avatar_name
        ]);
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit_index($id)
    {
        $titles=Title::OrderBy('tit_order')->get();
        $user=User::find($id);
        return view('editpage',compact('titles','user'));
    }
    public function edit($id, Request $request)
    {
        //dd($id);
        $name=$request['name'];
        $title_id=(int)$request['title_id'];
        $email=$request['email'];
        $user=User::find($id);
        $avatar_name="";
        if ($avatar=$request->file('file')){
            $avatar_name=$avatar->getClientOriginalName();
            $avatar->move('images/uploads',$avatar_name);
        }
        $user->update([
            'name'=>$name,
            'email'=>$email,
            'title_id'=>$title_id,
            'avatar'=>$avatar_name
        ]);
        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::find($id);
        if ($user !== null){
            $user->delete();
        }
    }
}
