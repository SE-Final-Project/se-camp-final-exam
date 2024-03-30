<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $user_lists = User::paginate(10);
            return view('homepage', compact('user_lists'));


        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data['title'] = Title::orderBy('id', 'asc')->get();
        // return view('addpage', $data);

        try {
            $title_lists = Title::paginate(10);
            return view('addpage', compact('title_lists'));

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_name = $request->input('name');
        $user_email = $request->input('email');
        $user_password = $request->input('password');
        $user_title = $request->input('title');

        $request->validate([
            'avatar' => 'nullable|mimes:png,jpg,jpeg,webp'
        ]);


        $user_avatar = null;
        $path = null;

        if($request->has('avatar')){
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $user_avatar = time().'.'.$extension;
            $path = 'uploads/category/';
            $file->move($path, $user_avatar);
        }

        User::create([
            'name' => $user_name,
            'email' => $user_email,
            'password' => $user_password,
            'avatar' => $path.$user_avatar,
            'title_id' => $user_title
        ]);

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
        $data['user_lists'] = User::find($id);
        $data['title_lists'] = Title::orderBy('id', 'asc')->get();

        return view('editpage', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user_list = User::find($id);
        $user_list->name = $request->input('edit-name');
        $user_list->email = $request->input('edit-email');
        $user_list->title_id = $request->input('edit-title');

        $request->validate([
            'edit-avatar' => 'nullable|mimes:png,jpg,jpeg,webp'
        ]);

        $path = null;
        $user_avatar = null;
        if($request->has('edit-avatar')){

            $file = $request->file('edit-avatar');
            $extension = $file->getClientOriginalExtension();

            $user_avatar = time().'.'.$extension;

            $path = 'uploads/category/';
            $file->move($path, $user_avatar);
        }

        $user_list->avatar = $path.$user_avatar;
        $user_list->save();

        return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $is_deleted = User::find($id)->delete();
        if ($is_deleted) {
            return redirect('/');
        } else {
            return redirect()->route('tasks.index')
                ->with('message', 'Delete Fail!');
        }
    }
}
