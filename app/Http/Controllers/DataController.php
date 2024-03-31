<?php

/**
* @class-name : DataController
* @class-description : controller of all data.
* @author : Thidarat Onsanit 65160337
* @create-date : 2024-03-31
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Title;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class DataController extends Controller
{
    /**
     * Display a listing of the resource. Thidarat Onsanit 65160337
     */
    public function index()
    {
        $data['data_title'] = Title::all();
        $data['data_user'] = User::select('users.*', 'titles.tit_name')
                        ->join('titles', 'users.title_id', '=', 'titles.id')
                        ->orderBy('users.id')
                        ->get();
        return view('homepage',$data);
    }

    /**
     * Display to show addpage data on home. Thidarat Onsanit 65160337
     */
    public function showAdd()
    {
        $data['data_title'] = Title::all()->sortBy('tit_order');
        return view('addpage', $data);
    }

    /**
     * Display to show editpage data on home. Thidarat Onsanit 65160337
     */
    public function showEdit(string $id)
    {
        $data['data_title'] = Title::all()->sortBy('tit_order');
        $data['data_user'] = User::find($id);
        return view('editpage', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage. Thidarat Onsanit 65160337
     */
    public function store(Request $request)
    {
        $data = New User();
        $data->name = $request->Name;
        $data->email = $request->Email;
        $data->password = $request->Password;
        if ($request->hasFile('Avatar')) {
            $data->avatar = str_replace('public/', 'storage/', $request->file('Avatar')->store('public/avatars'));
        }
        $data->title_id = $request->Title;

        $data->save();
        return redirect('/');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage. Thidarat Onsanit 65160337
     */
    public function update(Request $request, string $id)
    {
        $data = User::find($id);
        $data->name = $request->Name;
        $data->email = $request->Email;
        if ($request->hasFile('Avatar')) {
            $data->avatar = str_replace('public/', 'storage/', $request->file('Avatar')->store('public/avatars'));
        }
        $data->title_id = $request->Title;

        $data->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage. Thidarat Onsanit 65160337
     */
    public function destroy(string $id)
    {
        $data = User::find($id);
        if (File::exists($data->avatar)) {
            unlink($data->avatar);
        }
        $data->delete();

        return redirect('/');
    }
}
