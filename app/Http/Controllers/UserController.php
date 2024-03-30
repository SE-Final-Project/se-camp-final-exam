<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Storage;
use App\Models\crudModel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['titles'] = crudModel::all();
        return view('homepage',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addpage');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //แสดงข้แมูลจากฐานข้อมูล
    {
        $title = $request -> input("title");
        $name =  $request -> input("name");
        $email =  $request -> input("email");
        $password =  $request -> input("password");

        if($request -> file("avatar") == null){
            $avatarPath = null;
        }else{
            // เก็บpath ของรูปไว้ที่ public/avatars
            $avatarPath =  $request -> file("avatar")->store("public/avatars");
            // ลบpublicทิ้งเพราะเวลาเรียกใช้ไม่ต้องการ
            $avatarPath = Str::replace('public', '', $avatarPath);
        }

        $crud_data = new crudModel();

        $crud_data -> title = $title;
        $crud_data -> name = $name;
        $crud_data -> email = $email;
        $crud_data -> password = $password;
        $crud_data -> avatar = $avatarPath;

        $crud_data -> save();

        return Redirect::to("/homepage");
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
        $crud_data = crudModel::find($id);
        if($crud_data === null){
            return redirect('/homepage');
        }else{
            return view("editpage",compact("crud_data"));
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $title = $request -> input("title");
        $name = $request -> input("name");
        $email =  $request -> input("email");
        $password =  $request -> input("password");
        if($request -> file("avatar") == null){
            $avatarPath = null;
        }else{
            // เก็บpath ของรูปไว้ที่ public/avatars
            $avatarPath =  $request -> file("avatar")->store("public/avatars");
            // ลบpublicทิ้งเพราะเวลาเรียกใช้ไม่ต้องการ
            $avatarPath = Str::replace('public', '', $avatarPath);
        }

        $crud_data = crudModel::find($id);

        $crud_data -> title = $title;
        $crud_data -> name = $name;
        $crud_data -> email = $email;
        $crud_data -> password = $password;
        $crud_data -> avatar = $avatarPath;

        $crud_data -> save();

        return redirect("/homepage");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $crud_data = crudModel::find($id);

        $crud_data -> delete();

        return redirect('/homepage');
    }
}
