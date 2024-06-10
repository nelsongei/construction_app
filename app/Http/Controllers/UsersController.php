<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function index()
    {
        $users = User::where('user_type_id',1)->get();
        return view('users.index',compact('users'));
    }
    public function vendors()
    {
        $users = User::where('user_type_id',2)->get();
        return view('users.vendors',compact('users'));
    }
    public function clients()
    {
        $users = User::where('user_type_id',3)->get();
        return view('users.clients',compact('users'));
    }
}
