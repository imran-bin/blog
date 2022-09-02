<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function create()
    {
        $data=Category::all();    
        $subcategory=Subcategory::all();    
        return view('Admin.Subcategory.create',compact('data','subcategory'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
            'category_id' => 'required',
        ]);
        Subcategory::insert([
            'subcategory_name'=>$request->subcategory_name,
            'category_id'=>$request->category_id,

        ]);
        return redirect()->back()->with('message', "subcategory added successfullay");
    }
    public function delete($id)
    {
        $data=Subcategory::find($id);
        $data->delete();
        return redirect()->back()->with('status', "subcategory delete successfullay");
    }
}
