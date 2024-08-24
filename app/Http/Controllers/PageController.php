<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Mail\RecruitmentMail;
use App\Models\Category;
use App\Models\Extra;
use App\Models\Order;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\Restaurant;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Attachment;
use Cart;
use Mail;
use Carbon\Carbon;

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
        // Set the timezone to France (Europe/Paris)
        $currentTime = Carbon::now('Europe/Paris')->startOfMinute();  // Current time in France

        // Define the sections
        $morningStartTime = Carbon::createFromTime(9, 0, 0, 'Europe/Paris');    // 09:00 AM start
        $morningEndTime = Carbon::createFromTime(14, 45, 0, 'Europe/Paris');    // 14:45 PM end

        $eveningStartTime = Carbon::createFromTime(18, 15, 0, 'Europe/Paris');  // 18:15 PM start
        $eveningEndTime = Carbon::createFromTime(22, 30, 0, 'Europe/Paris');    // 22:30 PM end

        // Generate time slots for the morning/afternoon section
        $timeSlots = [];
        for ($time = $morningStartTime; $time->lte($morningEndTime);) {
            if ($time->gte($currentTime)) {
                $endSlot = $time->copy()->addMinutes(30);
                $timeSlots[] = $time->format('H:i') . ' - ' . $endSlot->format('H:i');
            }
            // Add 45 minutes to the current time (30-minute slot + 15-minute break)
            $time->addMinutes(45);
        }

        // Generate time slots for the evening/night section
        for ($time = $eveningStartTime; $time->lte($eveningEndTime);) {
            if ($time->gte($currentTime)) {
                $endSlot = $time->copy()->addMinutes(30);
                $timeSlots[] = $time->format('H:i') . ' - ' . $endSlot->format('H:i');
            }
            // Add 45 minutes to the current time (30-minute slot + 15-minute break)
            $time->addMinutes(45);
        }

        return view('user.checkout', compact('timeSlots'));
    }

    public function singleProduct($restaurant, Product $product)
    {
        $restaurant = Restaurant::where('slug', $restaurant)->first();
        $productOption = ProductOption::where('product_id', $product->id)->get();

        return view('user.single-product', compact('product', 'restaurant', 'productOption'));
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


        $zone = Restaurant::select('*')
            ->selectRaw('
            ( 6371 * acos(
                cos( radians(?) ) * cos( radians(JSON_UNQUOTE(JSON_EXTRACT(address, "$.latitude")) ) )
                * cos( radians(JSON_UNQUOTE(JSON_EXTRACT(address, "$.longitude"))) - radians(?) )
                + sin( radians(?) ) * sin( radians(JSON_UNQUOTE(JSON_EXTRACT(address, "$.latitude"))) )
            )
            ) AS distance', [$latitude, $longitude, $latitude])
            ->having('distance', '<', $radius)
            ->orderBy('distance')
            ->first();


        if ($zone) {
            return response()->json([
                'success' => true,
                'redirect_url' => route('restaurant.menu', ['slug' => $zone->slug]),
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No restaurants found in this zone.',
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
        return redirect()->back()->with('success', 'Page deleted');
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
    public function contactMail(Request $request)
    {
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

    public function showDeliveryOptions() {}

    public function invoice(Order $order)
    {
        return view('user-dashboard.invoice', compact('order'));
    }
    public function recruitment()
    {
        return view('user.recruitment');
    }

    public function recrutmentMail(Request $request)
    {
        // Validate the request, including the PDF file
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
            'city' => 'required|string',
            'terget_position' => 'required|string',
            'cv_file' => 'required|file|mimes:pdf|max:2048', // Validate the file as a PDF with a max size of 2MB
        ]);
        $pdf = $request->file('cv_file');
        $path = $pdf->storeAs('pdfs', $pdf->getClientOriginalName());

        // Prepare the data for the email
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'city' => $request->city,
            'terget_position' => $request->terget_position,
            'cv_file' => $path,
        ];


        // Send the email with the attached file
        Mail::to('asalaminsikder787@gmail.com')->send(new RecruitmentMail($data));

        // Return back with a success message
        return back()->with('success', 'Thank you for contacting us!');
    }
}
