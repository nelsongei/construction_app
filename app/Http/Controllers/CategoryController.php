<?php

namespace App\Http\Controllers;

use App\Http\Requests\category\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $categories = Category::orderBy('id')->get();
        return view('products.categories',compact('categories'));
    }
    public function store(CategoryRequest $request){
        try {
            DB::beginTransaction();
            $category = new Category();
            $category->name = $request->name;
            $category->save();
            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->withErrors($e->getMessage());
        }
        $request->session()->flash('alert-success','Category Successfully Saved');
        return back();
    }
    public function update(CategoryRequest $request)
    {
        try {
            DB::beginTransaction();
            $category = Category::findOrFail($request->id);
            $category->name = $request->name;
            $category->save();
            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->withErrors($e->getMessage());
        }
        $request->session()->flash('alert-success','Category Successfully Updated');
        return back();
    }
    public function delete(Request $request,$id)
    {
        try {
            DB::beginTransaction();
            Category::findOrFail($id)->delete();
            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->withErrors($e->getMessage());
        }
        $request->session()->flash('alert-success','Category Successfully removed');
        return back();
    }
}
