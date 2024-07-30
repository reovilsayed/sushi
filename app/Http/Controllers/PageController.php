<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function userIndex(){
        
        return view('user.home');
    }
    public function menu(){
        
        return view('user.menu');
    }
    public function userCheckout(){
        return view('user.checkout');
    }
    public function singleProduct(){
        return view('user.single-product');
    }
    public function restaurant(){
        return view('user.restaurant');
    }
    public function contact(){
        return view('user.contact');
    }
    public function userLogin(){
        return view('user.auth.login');
    }
    public function userRegister(){
        return view('user.auth.register');
    }

    public function cart(){
        return view('user.cart');
    }
}
