<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function viewRestaurants(){
        $restaurants = Restaurant::all();
        return view('pages.restaurants.all-restaurant',compact('restaurants'));
    }
    public function createRestaurant(){
        
        return view('pages.restaurants.create');
    }
}
