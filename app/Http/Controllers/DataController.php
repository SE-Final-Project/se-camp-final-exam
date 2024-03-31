<?php

namespace App\Http\Controllers;

use App\Models\data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['datas']= Data::all();
        return view('form', $data);
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
        $data = new Data();
        // dd($data);
        $data->name = $request->Name;
        $data->email = $request->Email;
        $data->password = $request->Password;
        $data->picture = $request->Picture;

        $data->save();


        return redirect('{{ url('/') }}');
    }

    /**
     * Display the specified resource.
     */
    public function show(data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, data $data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(data $data)
    {
        //
    }
}
