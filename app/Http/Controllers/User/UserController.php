<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userIndex(){
        return view('user.home');
    }
    public function restaurant(){
        return view('user.restaurant');
    }
    public function userCheckout(){
        return view('user.checkout');
    }
}
