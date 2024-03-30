<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Title;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class crudController extends Controller
{

    public function index()
    {
        $data["titles"] = User::all();
        return view("homepage", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("addpage");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request -> input("name");
        $email = $request -> input("email");
        $password = $request -> input("password");
        $avatar = $request -> input("avatar");
        $title = $request -> input("title");

        $titlesModel = new User();

        $titlesModel -> name = $name;
        $titlesModel -> email = $email;
        $titlesModel -> password = $password;
        $titlesModel -> avatar = $avatar;
        $titlesModel -> title_id = $title;

        $titlesModel->save();

        return Redirect::to("/Home");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /**$tit_data = titlesModel::find($id);

        if($tit_data === null){
            return Redirect::to("/user");
        } else{
        return view("read",compact("tit_data"));
        }**/                                    /* ไม่ได้ใช้ */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tit_data = User::find($id);

        if($tit_data === null){
            return Redirect::to("/Home");
        } else{
            return view("editpage",compact("tit_data"));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $request -> input("name");
        $email = $request -> input("email");
        $avatar = $request -> input("avatar");
        $title = $request -> input("title");

        $tit_data = User::find($id);

        $tit_data -> name = $name;
        $tit_data -> email = $email;
        $tit_data -> avatar = $avatar;
        $tit_data -> title_id = $title;

        $tit_data -> save();

        return Redirect::to("/Home");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tit_data = User::find($id);

        $tit_data  -> delete();

        return Redirect::to("/Home");
    }
}
