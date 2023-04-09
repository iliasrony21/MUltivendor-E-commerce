<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use Illuminate\Support\Str;
use Image;

class BrandController extends Controller
{
    public function index()
    {
        return view("admin.pages.brand.add");
    }
    public function store(Request $request)
    {
        $brand = new Brand;
        if($request->image){
            $image = $request->file("image");
            $customName = rand().".".$image->getClientOriginalExtension();
            $location = public_path("uploads/brand/".$customName);
            'Image'::make($image)->resize(120,120)->save($location);
            $brand->brand_image = $customName;
        }

            $brand->brand_name = $request->brand_name;
            $brand->brand_slug = Str::slug($request->brand_name);
            $brand->save();
            return back()->with('message',"Brand successfully Inserted");
    }
    public function show()
    {
        $brands = Brand::all();
        return view('admin.pages.brand.manage',compact('brands'));
    }

}
