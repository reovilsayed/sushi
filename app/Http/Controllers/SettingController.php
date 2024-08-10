<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  */
    public function index()
    {
       

        return view('pages.settings.update');
    }



    public function updateSettings(Request $request)
    {
        // Validate the form data
        $request->validate([
            'site_title' => 'required|string|max:255',
            'site_email' => 'required|email|max:255',
            'site_phone' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update the site title
        Setting::where('key', 'site.title')->update(['value' => $request->input('site_title')]);
        // Update the site email
        Setting::where('key', 'site.email')->update(['value' => $request->input('site_email')]);
        // Update the site phone
        Setting::where('key', 'site.phone')->update(['value' => $request->input('site_phone')]);


        // Handle the image upload
        if ($request->hasFile('image')) {
            // Store the image in the 'public' directory
            $path = $request->file('image')->store('images', 'public');

            // Update the image path in the database
            Setting::where('key', 'site.logo')->update(['value' => $path]);
        }

        // Optionally, add a success message and redirect
        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirmed',
        ]);

        $user = auth()->user();

        // Check if the current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect');
        }

        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password changed successfully');
    }
}
