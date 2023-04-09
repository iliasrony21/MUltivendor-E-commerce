<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Image;


class SubcategoryController extends Controller
{
    public function index()
    {
        $cats = Category::all();
        return view("admin.pages.subcategory.add",compact('cats'));
    }
    public function store(Request $request)
    {
            $subcategory = new Subcategory;

            $subcategory->subcat_name = $request->subcat_name;
            $subcategory->cat_id = $request->cat_id;
            $subcategory->subcat_slug = Str::slug($request->subcat_name);
            $subcategory->save();
            return back()->with('message',"SubCategory successfully Inserted");
    }
    public function show()
    {
        $subcategories = Subcategory::all();
        return view('admin.pages.subcategory.manage',compact('subcategories'));
    }
}
