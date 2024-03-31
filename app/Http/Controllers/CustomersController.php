<?php

namespace App\Http\Controllers;

use App\Models\customersmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CustomersController extends Controller
{
    public function index()
    {
        $data["customers"] = customersmodel::all();
        return view('homepage',$data);
    }

    public function create()
    {
        return view('addpage');
    }

    public function store(Request $request)
    {
        $title = $request->input("title");
        $name = $request->input("name");
        $email = $request->input("email");
        $password = $request->input("password");
        $avatar = $request->input("avatar");

        $customersModel  = new customersmodel();

        $customersModel -> c_title = $title;
        $customersModel -> c_name = $name;
        $customersModel -> c_email = $email;
        $customersModel -> c_password = $password;
        $customersModel -> c_avatar = $avatar;

        $customersModel -> save();

        $data["customers"] = customersmodel::all();
        return view('homepage',$data);

    }


    public function edit(String $id)
    {
        $c_data = customersmodel::find($id);
        $customers = customersmodel::all();

        if($c_data === null){
            return Redirect::to("/customers");
        }else{
            return view("editpage",compact("c_data"));
        }

    }

    public function update(Request $request,string $id)
    {
        $title = $request->input("title");
        $name = $request->input("name");
        $email = $request->input("email");
        $avatar = $request->input("avatar");

        $customersModel  = customersmodel::find($id);

        $customersModel -> c_title = $title;
        $customersModel -> c_name = $name;
        $customersModel -> c_email = $email;
        $customersModel -> c_avatar = $avatar;

        $customersModel -> save();

        $data["customers"] = customersmodel::all();
        return Redirect::to("/customers");
    }

    public function destroy(string $id)
    {
        $customerModelId = customersmodel::find($id);

        $customerModelId -> delete();
        
        return Redirect::to("/customers");
    }
}
