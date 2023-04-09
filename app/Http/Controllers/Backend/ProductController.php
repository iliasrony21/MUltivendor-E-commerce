<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\User;
use Illuminate\Support\Str;
use Image;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index(){
        $cats = Category::all();
        $subcats = SubCategory::all();
        $brand = Brand::all();
        $vendors = User::where('role','vendor')->get();
        return view("admin.pages.product.add",compact("cats","subcats","brand","vendors"));
    }
    function store(Request $request){
        $pImage = "";
        if($request->image){
            $image = $request->file("image");
            $customName = rand().".".$image->getClientOriginalExtension();
            $location = public_path("uploads/product/".$customName);
            'Image'::make($image)->resize(1100,1100)->save($location);
            $pImage = $customName;

        }
        $pid = Product :: insertGetId([
        "cat_id"=>$request->cat_id,
       "subcat_id"=>$request->subcat_id,
       "brand_id"=>$request->brand_id,
        "product_name"=>$request->product_name,
        "slug"=>Str::slug($request->product_name),
        "product_code"=>$request->product_code,
       "quantity"=>$request->quantity,
        "short_des"=>$request->short_des,
        "long_des"=>$request->long_des,
        "tags"=>$request->tags,
        "color"=>$request->color,
        "size"=>$request->size,
       "selling_price"=>$request->selling_price,
       "discount_price"=>$request->discount_price,
        "image"=>$pImage,
        "hot_deals"=>$request->hot_deals,
        "special_offer"=>$request->special_offer,
        "special_deals"=>$request->special_deals,
        "featured"=>$request->featured,
       "vendor_id"=>$request->vendor_id,


        ]);
        if($request->images){
            $images = $request->file("images");
            foreach($images as $image){
                $customName1= rand().".".$image->getClientOriginalExtension();
                $location1 = public_path("uploads/product/gallery/".$customName1);
                'Image'::make($image)->resize(1100,1100)->save($location1);
                ProductGallery::insert([
                    'product_id' => $pid,
                    'images' => $customName1,
                ]);
            }


        }
        return back()->with('message',"Product successfully uploaded");

    }

}
