<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $items = User::all(); // Get all items from database
        return view('homepage', compact('items')); // Pass items to the index view
    }
    public function view_adduser()
    {
        return view('addpage');
    }
    public function view_edituser(Request $request, $id)
    {
        $TargetUser = User::findOrFail($id);
        return view('editpage', compact('TargetUser'));
    }      
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name' => 'required',
            'email' =>'required|email',
            'password' => 'required',
        ]);
        $requestData = $request->all();
        if ($image = $request->file('image')) {
        $fileName = time().$request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');
        $requestData["image"] = '/storage/'.$path;
        }else {
            $requestData["image"] = '/storage/images/noimage.png';
        }
        User::create($requestData);
        return redirect('homepage')->with('flash_message', 'list Addedd!');
    }
    public function update(Request $request, $id)
    {
        $item = User::findOrFail($id);
        $updateData=[];

        $input = $request->all();

        if ($image = $request->file('image')) {
            $fileName = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $input["image"] = '/storage/'.$path;
        }

          // Check for other fields and update only if data has changed
          foreach ($input as $field => $value) {
            if ($value !== null && $value !== $item->$field) { // Check for null and change
              $updateData[$field] = $value;
            }
          }
          if ($updateData) {
            $item->update($updateData);
          }
          
        return redirect('homepage')->with('flash_message', 'list update!');
    }
    public function destroy(Request $request, $id){
        $item = User::findOrFail($id);
        $item->delete();
        return redirect('homepage')->with('flash_message', 'list delete!');

    }

}   
