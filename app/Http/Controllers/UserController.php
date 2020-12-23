<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {

        $user=User::select('*')->get();
        return view('users.index',compact('user'));
    }
    public function store(Request $request)
    {
       User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'position' => $request->position,
            'password' => Hash::make($request->password),
        ]);

        return back()->withstatus(__('Password successfully updated.'));
    }
}
