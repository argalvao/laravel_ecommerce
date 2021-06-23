<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\User;

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

    public function usuario(){
        $usuarios = User::all();
        return view ('auth.usuario', compact('usuarios'));
    }

    public function concluido(){
        return view('carrinho.concluido');
    }
}
