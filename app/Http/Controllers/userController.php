<?php

namespace App\Http\Controllers;

use App\Models\userModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class userController extends Controller
{
    public function index()
    {
        $data["users"] = userModel::all();
        return view("homepage",$data);       
    }


    public function create()
    {
        return view("addpage");
    }

   
    public function store(Request $request)
    {
        $title = $request->input("title");
        $name = $request->input("name");
        $email = $request->input("email");
        $password = $request->input("password");
        $avatar = $request->input("avatar");

        $userModel  = new userModel();

        $userModel -> u_title = $title;
        $userModel -> u_name = $name;
        $userModel -> u_email = $email;
        $userModel -> u_password = $password;
        $userModel -> u_avatar = $avatar;

        $userModel -> save();
        return Redirect::to("/user");
    }

  
    public function show(string $id)
    {
      
    }


    public function edit(string $id)
    {
        $u_data = userModel::find($id);
        $users = userModel::all();

        if($u_data === null){
            return Redirect::to("user");
        }else{
            return view("addpage",compact("u_data"));
        }
    }


    public function update(Request $request, string $id)
    {
        $title = $request -> input("title");
        $name = $request -> input("name");
        $email = $request -> input("email");
        $password = $request -> input("password");
        $avatar = $request -> input("avatar");

        $userModelId = userModel::find($id);

        $userModelId -> u_title = $title;
        $userModelId -> u_name = $name;
        $userModelId -> u_email = $email;
        $userModelId -> u_password = $password;
        $userModelId -> u_avatar = $avatar;


        $userModelId -> save();

        return Redirect::to("/user");
    }

  
    public function destroy(string $id)
    {
        
    }
}
