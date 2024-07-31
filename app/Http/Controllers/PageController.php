<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function userIndex()
    {
        $restaurants = Restaurant::all();
        return view('user.home', compact('restaurants'));
    }
    public function menu($slug)
    {
        $restaurant=Restaurant::where('slug',$slug)->first();
   
        $categories = Category::whereNull('parent_id')->get();
        $sub_categories = Category::whereNotNull('parent_id')->get();
        // dd($sub_categories[0]->products);
        return view('user.menu', compact('categories', 'sub_categories','restaurant'));
    }
    public function userCheckout()
    {
        return view('user.checkout');
    }
    public function singleProduct($restaurant,Product $product)
    {
        $restaurant=Restaurant::where('slug',$restaurant)->first();
        return view('user.single-product', compact('product','restaurant'));
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
