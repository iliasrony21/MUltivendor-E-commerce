<?php

namespace App\Http\Controllers;

use App\Models\AddtoCart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function index(){
        $cats = Category::all();
        $featuredproducts = Product::where("featured","Featured")->get();
        $userData = User::find(Auth::user()->id);
        return view("dashboard",compact('userData',"cats","featuredproducts"));
    }
    public function home(){
        $cats = Category::all();
        $featuredproducts = Product::where("featured","Featured")->get();
        return view('welcome',compact("cats","featuredproducts"));
    }
    public static function gallery($product_id){
        return ProductGallery::where("product_id",$product_id)->get();
    }
    public function  addtocart($id){
        $user_id = Auth::user()->id;
        $product_info = Product::find($id);
        $addtocart = new AddtoCart;
        $addtocart->user_id = $user_id;
        $addtocart->product_id = $product_info->id;
        $addtocart->product_name = $product_info->product_name;
        $addtocart->qnt = 1;
        $addtocart->price = $product_info->selling_price;
        $addtocart->image = $product_info->image;
        $addtocart->save();
        return response()->json([
            'msg' => "THis Product added to the cart"
        ]);
    }
    public function addtocartshow(){
        $user_id = Auth::user()->id;
        $carts = AddtoCart::where("user_id",$user_id)->get();
        return response([
            'data'=> $carts
        ]);
    }
    function removeitem($id){

        $carts = AddtoCart::find($id);
        $carts->delete();
        return response()->json([

            'msg'=> "Item successfully deleted"
        ]);

    }
    function viewcart(){
        $cats = Category::all();
        $featuredproducts = Product::where("featured","Featured")->get();
        $user_id = Auth::user()->id;
        $cartItem = AddtoCart::where("user_id",$user_id)->get();
        return view("include.viewcart",compact("cartItem","cats","featuredproducts"));

    }
}
