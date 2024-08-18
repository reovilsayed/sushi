<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\Category;
use App\Models\Extra;
use App\Models\Page;
use App\Models\Product;
use App\Models\Restaurant;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cart;
use Mail;

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
    public function thank_you()
    {
        return view('thank_you');
    }

    public function cart()
    {
        if (Cart::getContent()->isEmpty()) {
            $restaurants = Restaurant::all();
            return view('user.restaurant', compact('restaurants'));
        } else {
            $extras = Extra::latest()->where('type', 'cart')->get();
            return view('user.cart', compact('extras'));
        }        
    }
    public function checkLocation(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        // dd($latitude);
        $radius = 5;


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
    public function adminPages()
    {
        $pages = Page::all();
        return view('pages.pages.pageslist', compact('pages'));
    }
    public function pagesCreate()
    {
        return view('pages.pages.create');
    }
    public function pagesStore(Request $request)
    {
        $page = new Page;
        $page->title = $request->title;
        $page->slug = Str::slug($request->title);
        $page->body = $request->body;
        $page->save();
        return redirect(route('admin.pages'))->with('success', 'page added successfully');
    }
    public function destroyPage(Page $page)
    {
        $page->delete();
        return redirect()->back()->with('success', 'Restaurant deleted');
    }
    public function pagesEdit(Page $page)
    {
        return view('pages.pages.edit', compact('page'));
    }
    public function pagesUpdate(Request $request, Page $page)
    {
        $page->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
        ]);
        $page->save();
        return redirect(route('admin.pages'))->with('success', 'Pages Updated Successfully');
    }
    public function pageView($page)
    {
        $data = Page::where('slug', $page)->first();

        return view('pages.pages.page', compact('data'));
    }
    public function contactMail(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'subject' => $request->subject,
        ];
        Mail::to('contact@gmail.com')->send(new ContactFormMail($data));
        
        return back()->with('success', 'Thank you for contacting us!');
        
    }
}
