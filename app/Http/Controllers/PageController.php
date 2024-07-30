<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function userIndex()
    {
        $restaurants = Restaurant::all();
        return view('user.home', compact('restaurants'));
    }
    public function menu()
    {
        $categories = Category::whereNull('parent_id')->get();
        $sub_categories = Category::with('products')->whereNotNull('parent_id')->get();
        dd($sub_categories);
        return view('user.menu');
    }
    public function userCheckout()
    {
        return view('user.checkout');
    }
    public function singleProduct()
    {
        return view('user.single-product');
    }
    public function restaurant()
    {
        $restaurants = Restaurant::all();
        return view('user.restaurant', compact('restaurants'));
    }
    public function contact()
    {
        return view('user.contact');
    }
    public function userLogin()
    {
        return view('user.auth.login');
    }
    public function userRegister()
    {
        return view('user.auth.register');
    }

    public function cart()
    {
        return view('user.cart');
    }
}
