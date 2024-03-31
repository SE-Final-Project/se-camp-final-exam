<?php

namespace App\Http\Controllers;

use App\Models\M_users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        $data['users'] = M_users ::all();
        return view("users.homepage" , $data);       
    }


    public function create()
    {
        return view("users.addpage");
    }

    public function store(Request $request)
    {
        $title = $request -> input("title") ;
        $name = $request -> input("name") ;
        $email = $request -> input("email") ;
        $avatar = $request -> input("avatar") ;
        $M_users = new M_users ;
        $M_users -> u_tit = $title ;
        $M_users -> u_name = $name ;
        $M_users -> u_email = $email ;
        $M_users -> u_avatar = $avatar ;

        $M_users ->save() ;

        return view ("users.homepage");
    }

    public function show(string $id)
    {

    }


    public function edit(string $id)
    {
        
    }


    public function update(Request $request, string $id)
    {
        
    }

    public function destroy(string $id)
    {
        
    }
}
