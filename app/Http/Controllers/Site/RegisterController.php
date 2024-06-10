<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index()
    {
        $categories = Category::orderBy('id')->get();
        return view('auth.register',compact('categories'));
    }
    public function register(Request $request)
    {
        $client = new User();
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->email = $request->email;
        $client->id_no = $request->id_no;
        $client->password = Hash::make($request->password);
        $client->user_type_id = 3;
        $client->user_name = $request->first_name.$request->last_name;
        $client->save();
        return redirect()->back();
    }
}
