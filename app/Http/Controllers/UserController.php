<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

//65160219 นางสาวดวงกมล ลืออริยทรัพย์

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        session(['key' => 'value']);
        $data['users'] = User::all();

        return view('homepage', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $title_id = $request->input('title_id');
        $name = $request->input('name');
        $email = $request->input('email');
        $avatar = $request->input('avatar');
        if($avatar == null){
            $avatar = "ไม่มีรูป";
        }
        $User = new User();
        $User->title_id = $title_id;
        $User->name = $name;
        $User->email = $email;
        $User->avatar = $request->file('avatar')->store('public/avatar');
        $User->save();
        // use Illuminate\Support\Facades\Redirect;
        return Redirect::to('homepage');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data['id'] = User::find($id);
        $data['users'] = User::all();
        return view('homepage', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $title_id = $request->input('title_id');
        $name = $request->input('name');
        $email = $request->input('email');
        if($avatar == null){
            $avatar = "ไม่มีรูป";
        }
        $User = User::find($id);
        $User->title_id = $title_id;
        $User->name = $name;
        $User->email = $email;
        $User->save();
        // use Illuminate\Support\Facades\Redirect;
        return Redirect::to('homepage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //.
         $User = User::find($id);
         $User->delete();
          //return Redirect::to('/titles');
    }
}
