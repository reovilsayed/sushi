<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\RestaurantZone;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class RestaurantController extends Controller
{
    public function viewRestaurants()
    {
        $restaurants = Restaurant::latest()->get();
        return view('pages.restaurants.all-restaurant', compact('restaurants'));
    }
    public function createRestaurant()
    {
        $areas = RestaurantZone::all();
        return view('pages.restaurants.create', compact('areas'));
    }
    public function storeRestaurant(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
        ]);
        $api_key = [
            'merchantId' => $request->merchantId,
            'secretKey' => $request->secretKey,
        ];
        
        $restaurant = new Restaurant;

        $restaurant->name = $request->name;
        $restaurant->description = $request->description;
        $restaurant->email = $request->email;
        $restaurant->number = $request->number;

        $restaurant->address = $request->address;

        $restaurant->api_key = json_encode($api_key);
        $restaurant->key_version = $request->key_version;
        $restaurant->sid = $request->sid;
        $restaurant->token = $request->token;
        $restaurant->printer_id = $request->printer_id;
        $restaurant->serial_number = $request->serial_number;
        $restaurant->slug = Str::slug($request->name);
        if ($request->hasFile('image')) {
            if ($restaurant->image && Storage::exists($restaurant->image)) {
                Storage::delete($restaurant->image);
            }
            $restaurant->image = $request->file('image')->store('restaurant', 'public');
        }

        $restaurant->save();
        return redirect(route('admin.restaurants'))->with('success', 'Restaurant Created Successfully');
    }
    public function editRestaurant(Restaurant $restaurant)
    {

        return view('pages.restaurants.edit', compact('restaurant'));
    }
    public function updateRestaurant(Request $request, Restaurant $restaurant)
    {
        ;
        if ($request->has('image')) {
            $image = $request->file('image')->store('restaurant', 'public');
            Storage::delete($request->image);
        } else {
            $image = $restaurant->image;
        }
        $api_key = [
            'merchantId' => $request->merchantId,
            'secretKey' => $request->secretKey,
        ];
        
        $restaurant->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $image,
            'description' => $request->description,
            'email' => $request->email,
            'number' => $request->number,
            'address' => $request->address,
            'api_key' => json_encode($api_key),
            'key_version' => $request->key_version,
            'sid' => $request->sid,
            'token' => $request->token,
            'printer_id' => $request->printer_id,
            'serial_number' => $request->serial_number,
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
        return redirect(route('admin.restaurants'))->with('success', 'Restaurant deleted');
    }
}
