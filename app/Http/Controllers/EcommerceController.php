<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class EcommerceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$products = Product::all();
        return view('welcome',compact('products'));
    } 
}
