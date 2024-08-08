<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function userIndex()
    {
        $id = auth()->user()->id;
        $orders = Order::where('customer_id', $id)->get();
        //  $orders = Order::all();
        return view('user-dashboard.dashboard', compact('orders'));
    }

    public function UpdateName(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->save();
        return redirect()->back()->with('success', 'Name updated successfully');
    }
    public function UpdatePassword(Request $request)
    {


        $validated = $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|confirmed',
        ]);


        if (Hash::check($request->current_password, Auth::user()->password)) {

            $user = User::find(auth()->id());
            $user->password = Hash::make($request->password);
            $user->save();


            return back()->with('success', 'Password updated successfully');
        } else {
            return back()->withErrors('Success');
        }
    }
}