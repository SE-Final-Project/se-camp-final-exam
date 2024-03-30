<?php

namespace App\Models\User;
namespace App\Http\Controllers;

use App\Models\User;
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
        $data['users'] = User::all(); //ดึงข้อมูลจากModel allคือการ getdataทั้งหมด
        return view('homepage',$data);
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
        // $name = $request->input('name');
        // $email = $request->input('email');
        // $tit_is_active = $request->input('tit_is_active');
        // if($tit_is_active == "on"){
        //     $tit_is_active =1;
        // }else{
        //     $tit_is_active =0;
        // }
        // $m_titles = new M_titles;
        // $m_titles ->tit_NAME =$tit_name;
        // $m_titles ->tit_is_active = $tit_is_active;
        // $m_titles -> save();

        // return Redirect::to('/titles');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $data['id'] = User::find($id);
        $data['users'] = User::all();
        return view('homepage',$data);
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
        $id = $request->DB::select('select * from users where active = ?', [1])('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $avata = $request->file('avata');
        // $tit_is_active = $request->input('tit_is_active');
        // if($tit_is_active == "on"){
        //     $tit_is_active =1;
        // }else{
        //     $tit_is_active =0;
        // }
        $User = User::find($id);
        $id = $request->DB::select('select * from users where active = ?', [1])('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $avata = $request->file('avata');
        $User -> save();

        return Redirect::to('/homepage');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
