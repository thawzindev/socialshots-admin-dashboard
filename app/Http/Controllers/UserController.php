<?php

namespace App\Http\Controllers;

use App\Models\UserMongoDB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = UserMongoDB::get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function statusToggle(UserMongoDB $user)
    {
        // $user->update([
        //     'status' => $user->status === 'ACTIVE' ? 'BANNED' : "ACTIVE"
        // ]);

        // return $user;

        $user->status = $user->status === 'ACTIVE' ? 'BANNED' : "ACTIVE";

        $user->save();
   
        return redirect()->route('users.index')->with('success', 'Successfully updated user status.');
    }
}
