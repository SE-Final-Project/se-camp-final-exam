<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Title;
use Illuminate\Contracts\Support\ValidatedData;

class userController extends Controller
{
        public function insert(Request $request)
        {
            $validatedData = $req->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'avatar' => 'nullable',
                'title_id' => 'required',
            ]);

            if ($req->hasFile('avatar')) {
                $Avatar = $req->file('avatar');
                $avatarPath = $Avatar->store('public/avatars');
                $validatedData['avatar'] = basename($avatarPath);
            }

            $validatedData['password'] = bcrypt($validatedData['password']);

            $user = new User($validatedData);
            $user->save();

            return redirect()->route('home');
        }
}
