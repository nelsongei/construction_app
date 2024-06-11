<?php

namespace App\Http\Controllers;

use App\Http\Requests\vendor\AddVendorRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
    public function vendorStore(AddVendorRequest $request){
        try {
            DB::beginTransaction();
            $vendor = new User();
            $vendor->user_name = $request->user_name;
            $vendor->first_name = $request->first_name;
            $vendor->last_name = $request->last_name;
            $vendor->email = $request->email;
            $vendor->id_no = $request->id_no;
            $vendor->phone = $request->phone;
            $vendor->address = $request->address;
            $vendor->user_type_id = 3;
            $vendor->password = Hash::make($request->password);
            $vendor->save();
            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->withErrors($e->getMessage());
        }
        $request->session()->flash('alert-success', 'Vendor Successfully Saved');
        return back();
    }
    public function updateVendor(Request $request)
    {
        try {
            DB::beginTransaction();
            $vendor = User::findOrFail($request->id);
            $vendor->user_name = $request->user_name;
            $vendor->first_name = $request->first_name;
            $vendor->last_name = $request->last_name;
            $vendor->email = $request->email;
            $vendor->id_no = $request->id_no;
            $vendor->phone = $request->phone;
            $vendor->address = $request->address;
            $vendor->password = Hash::make($request->password);
            $vendor->save();
            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->withErrors($e->getMessage());
        }
        $request->session()->flash('alert-success', 'Vendor Successfully Saved');
        return back();
    }
    public function deleteVendor(Request $request,$id)
    {
        try {
            DB::beginTransaction();
            User::findOrFail($id)->delete();
            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->withErrors($e->getMessage());
        }
        $request->session()->flash('alert-success','Vendor Successfully removed');
        return back();
    }
}
