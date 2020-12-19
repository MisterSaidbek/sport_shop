<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $productsAll = Product::get();
        $productsRandom = Product::inRandomOrder()->get();

        return view('index')->with(compact('productsAll','productsRandom'));
    }
    public function cart(){
        return view('pages.cart');
    }
    public function page404(){
        return view('pages.404');
    }
    public function login_account(){
        return view('pages.login');
    }
    public function product_details(){
        return view('pages.product_details');
    }

}
