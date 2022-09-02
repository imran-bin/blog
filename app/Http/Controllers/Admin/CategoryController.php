<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function create()
    {
        $data=Category::all();

        return view('Admin.Category.create',compact('data'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories',

        ]);
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->category_slug = Str::of($request->category_name)->slug('-');
        $category->save();
        return redirect()->back()->with('message', "category Added successfullay");
    }
    public function delete($id)
    {
        $data=Category::find($id);
        $data->delete();
        return redirect()->back()->with('status', "category Delete successfullay");
    }
}
