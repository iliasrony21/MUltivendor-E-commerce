<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apitest;
use App\Models\User;

class ApitestController extends Controller
{
    function index(){
        return view("/apitest");
    }
    // function store(Request $request){
    //     $api = new Apitest;
    //     $api->title = $request->title;
    //     $api->des = $request->des;
    //     $api->price = $request->price;
    //     $api->rating = $request->rating;
    //     $api->image = $request->image;
    //     $api->save();
    //     return response()->json([
    //         "msg" => "Data Successfully Inserted"

    //     ]);
    // }
    function insert(Request $request){
        $api = new Apitest;
        $api->title = $request->title;
                $api->des = $request->des;
                $api->price = $request->price;
                $api->rating = $request->rating;
                $api->image = $request->image;
                $api->save();
                if($api->save()){
                    return ['success'=> $api];
                }
                else{
                    return ['success' => "operation failed"];
                }

        // $api = new Apitest;
        // $user = User::where("email", $request->email)->first();
        // if(count($user)>0){
        //     if($request->token === "majid"){
        //         $api->title = $request->title;
        //         $api->des = $request->des;
        //         $api->price = $request->price;
        //         $api->rating = $request->rating;
        //         $api->image = $request->image;
        //         $api->save();
        //         if($api->save()){
        //             return response()->json([
        //                 "status" => "200",
        //                 "msg" => "Data Successfully Inserted"

        //             ]);
        //         }


        //     }
        // }
        // else{
        //     return response()->json([

        //         "status" => "103",
        //         "msg"=>"Data not submitted"
        //     ]);
        // }

    }
}
