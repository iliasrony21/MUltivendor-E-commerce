<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function login(){

        return view('vendor.login');
    }
    public function index(){

        return view('vendor.dashboard');
    }
}
