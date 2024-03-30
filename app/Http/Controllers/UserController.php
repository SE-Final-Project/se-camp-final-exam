<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Title;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\alert;

class UserController extends Controller
{
    public function showHomePage()
    {
        //ดึงdataจากdatabase
        $users = User::all();
        
        //ไปหน้า homepage
        return view('homepage', ['users' => $users]);
    }

    public function showAddPage()
    {
        $titles = Title::orderBy('id')->get();

        return view('addpage', ['titles' => $titles]);
    }

    public function showEditPage($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('homepage')->with('error', 'User not found.');
        }
        $titles = Title::all();
        return view('editpage', compact('user', 'titles'));
    }
    

    public function storeUser(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation rule for avatar upload
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        //เก็บข้อมูล
        $user = new User();
        $user->title = $request->title;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); //สร้างความปลอดภัยในการเก็บรหัส
        //รับรูป
        if ($request->hasFile('avatar')) {
            $fileName = time().$request->file('avatar')->getClientOriginalName();
            $avatarPath = $request->file('avatar')->storeAs('avatars',$fileName,'public');
            $user->avatar = '/storage/'.$avatarPath;
        } else{
            //หากไม่มีการใส่ให้เป็น null
            $user -> avatar = null;
        }
        $user->save();
    
        // Redirect the user after successful submission
        return redirect()->route('homepage')->with('success', 'User added successfully!');
    }
    

    public function updateUser(Request $request, $id){

        $validatedData = $request->validate([
            'title' => 'required',
                'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|min:6', // Allow password to be nullable
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation rule for avatar upload
        ]);

        //หา ID user
        $user = User::findOrFail($id);

        //อัพเดท
        $user->title = $validatedData['title'];
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
            if ($request->filled('password')) {
            $user->password = bcrypt($validatedData['password']); // Hash the password for security
            }
        //อัพโหลดหากมีการเก็บรูป
        if ($request->hasFile('avatar')) {
            $fileName = time().$request->file('avatar')->getClientOriginalName();
            $avatarPath = $request->file('avatar')->storeAs('avatars',$fileName,'public');
            $user->avatar = '/storage/'.$avatarPath;
        } else{
            //หากไม่มีการใส่ให้เป็น null
            $user -> avatar = null;
        }
        $user->save();

        //กลับหน้าHomepage
        return redirect()->route('homepage')->with('success', 'User updated successfully!');
    }

    public function deleteUser($id)
    {
    $user = User::findOrFail($id);
    
    $user->delete();
    
    //กลับหน้าHomepage
    return redirect()->route('homepage')->with('success', 'User deleted successfully.');
    }


    
}
