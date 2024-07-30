<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function userIndex(){
        return view('user.home');
    }
    public function restaurant(){
        return view('user.restaurant');
    }
    public function userCheckout(){
        return view('user.checkout');
    }
    public function singleProduct(){
        return view('user.single-product');
    }
    public function cart(){
        return view('user.cart');
    }
}
