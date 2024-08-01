<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class RestaurantController extends Controller
{
    public function viewRestaurants(){
        $restaurants = Restaurant::latest()->get();
        return view('pages.restaurants.all-restaurant',compact('restaurants'));
    }
    public function createRestaurant(){
        
        return view('pages.restaurants.create');
    }
    public function storeRestaurant(Request $request){
        $validated = $request->validate([
            'name' => 'required|string',
        ]);
        $restaurant = new Restaurant;
        $restaurant->name = $request->name;
        $restaurant->slug = Str::slug($request->name);
        if ($request->hasFile('image')) {
            if ($restaurant->image && Storage::exists($restaurant->image)) {
                Storage::delete($restaurant->image);
            }
            $restaurant->image = $request->file('image')->store('restaurant','public');
        }
        $restaurant->description = $request->description;
        $restaurant->save();
        return redirect(route('admin.restaurants'))->with('success','Restaurant Created Successfully');
    } 
    public function editRestaurant(Restaurant $restaurant) {

        return view('pages.restaurants.edit',compact('restaurant'));
    }
    public function updateRestaurant(Request $request, Restaurant $restaurant)
    {

        if ($request->has('image')) {
            $image = $request->file('image')->store('restaurant','public');
            Storage::delete($request->image);
        } else {
            $image = $restaurant->image;
        }

        $restaurant->update([
            'name' => $request->name,
            'image' => $image,
            'description' => $request->description,
        ]);
        $restaurant->save();
        
        return redirect(route('admin.restaurants'))->with('success', 'Restaurant Updated Successfully');
    }
    public function destroyRestaurant(Restaurant $restaurant)
    {
        if ($restaurant->image && Storage::exists($restaurant->image)) {
            Storage::delete($restaurant->image);
        }

        $restaurant->delete();
        return redirect(route('restaurants'))->with('success', 'Restaurant deleted');
    }
}
