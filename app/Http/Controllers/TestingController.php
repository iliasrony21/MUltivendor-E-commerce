<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\testing;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TestingController extends Controller
{
    function insert(Request $request){
       $api = new testing;
       $user = User::where("email", $request->email)->first();
        if($user!=null){
            if($request->token === "majid"){
                $api->title = $request->title;
                $api->des = $request->des;
                $api->price = $request->price;
                $api->rating = $request->rating;

                $api->save();

                   if($api->save()){
                     return response()->json([
                        "status" => "200",
                        "msg" => "Data Successfully Inserted"

                    ]);
                   }
            }
        }
        else{
            return response()->json([

                "status" => "103",
                "msg"=>"Data not submitted"
            ]);
        }
            }
}

