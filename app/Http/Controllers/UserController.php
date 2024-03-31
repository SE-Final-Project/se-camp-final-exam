<?php

namespace App\Http\Controllers;

use App\Models\userModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()      /*โชว์หน้าhome page*/
    {
        $data["customers"]= userModel::all();
        return view("homepage",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('addpage');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = $request->input("title");
        $name = $request->input("name");
        $email = $request->input("email");

        $userModel= new userModel();

        $userModel->c_title = $title;
        $userModel->c_name = $name;
        $userModel->c_email = $email;

        $userModel->save();
        
        return Redirect::to("/users");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $c_data  = userModel::find($id);

        if($c_data === null){
            return Redirect::to("/users"); 
        }else{
        return view('read',compact("c_data"));
    }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $c_data  = userModel::find($id);

        if($c_data === null){
            return Redirect::to("/users"); 
        }else{
        return view('editpage',compact("c_data"));
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $title = $request-> input('title');
        $name = $request-> input('name');
        $email = $request-> input('email');
       

        $userModelId  = userModel::find($id);

        $userModelId -> c_title = $title;
        $userModelId -> c_name = $name;
        $userModelId -> c_email = $email;
      

        $userModelId -> save();

        return  Redirect:: to('/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $userModelId = userModel::find($id);
        
        $userModelId -> delete();
        
        return Redirect::to("/users");
    }
}