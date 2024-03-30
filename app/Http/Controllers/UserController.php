<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
 
class UserController extends Controller
{
    function home_view(){
        return view('homepage');
    }
 
    function add_view(){
        return view('addpage');
    }

    function edit_view(){
        return view('editpage');
    }
 
    function add_process(Request $req){
        $req->validate([
        'title' => 'required',
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
        'avatar' => 'required',
        ]);
 
        $data = $req->all();
        print_r($data);
        die;

        User::create($data);
 
        return Redirect::to('homepage');
    }
}