<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Extra;
use App\Models\Product;
use App\Models\Restaurant;
use App\Models\Zone;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function userIndex()
    {
        $restaurants = Restaurant::latest()->take(6)->get();

        $zones = Zone::with('restaurants')->get();
        // foreach ($zones as $zone) {
        //     dd($zone);
        // }
        return view('user.home', compact('restaurants', 'zones'));
    }

    public function menu($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();

        $categories = Category::whereNull('parent_id')->get();
        $sub_categories = Category::whereNotNull('parent_id')->get();
        // dd($sub_categories[0]->products);
        return view('user.menu', compact('categories', 'sub_categories', 'restaurant'));
    }
    public function userCheckout()
    {
        return view('user.checkout');
    }
    public function singleProduct($restaurant, Product $product)
    {
        $restaurant = Restaurant::where('slug', $restaurant)->first();
        return view('user.single-product', compact('product', 'restaurant'));
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
        $extras = Extra::latest()->where('type', '=', 'cart')->get();
        return view('user.cart', compact('extras'));
    }
    public function checkLocation(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        // dd($latitude);
        $radius = 5; // Define the radius in kilometers

        // Find the nearest zone within the specified radius
        $zone = Zone::select('zones.*')
            ->selectRaw('( 6371 * acos( cos( radians(?) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( lat ) ) ) ) AS distance', [$latitude, $longitude, $latitude])
            ->having('distance', '<', $radius)
            ->orderBy('distance')
            ->first();

        if ($zone) {
            $restaurant = $zone->restaurants()->first();

            if ($restaurant) {
                return response()->json([
                    'success' => true,
                    'redirect_url' => route('restaurant.menu', ['slug' => $restaurant->slug]),
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No restaurants found in this zone.',
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No zone found near your location.',
            ]);
        }
    }
}
