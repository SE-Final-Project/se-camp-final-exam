<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
Use Illuminate\Support\Facades\DB;
class C_User extends Controller
{
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = $user->id . '.' . $extension;
            $file->move(public_path('uploads'), $filename);
            $user->avatar = $filename;
            $user->save();
        }
        return redirect(url('/'));
    }

    public function index()
    {
        $users = User::all();
        return view('homepage', compact('users'));
    }
    public function create()
    {
        return view('addpage');
    }
    // การแก้ไขข้อมูล 65160222
    public function edit($id){
        $users = User::find($id);
        return view("editpage",compact('users'));

    }
    // การแก้ไขข้อมูลเเละทำการอัพเดทบนหน้าเว็บ 65160222
    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->save();
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = $users->id . '.' . $extension;
            $file->move(public_path('uploads'), $filename);
            $users->avatar = $filename;
            $users->save();
        }
        return redirect(url('/'));
    }

    // การลบข้อมูล 65160222
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();

        // DB::statement('SET @new_id = 0;');
        // DB::statement('UPDATE users SET id = @new_id:=@new_id+1');
        // DB::statement('ALTER TABLE users AUTO_INCREMENT = 1;');

        return response()->json(['success' => true]);
        return redirect('/');

    }

}
