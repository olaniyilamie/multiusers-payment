<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function redirectTo() {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        if (Auth::user()->role == 'is_admin') {
            return redirect()->route('admin');
        }
    
        return redirect()->route('user');
    }

    public function userIndex()
    {
        if(Auth::user()->role == 'free_user')
        {
            return view('users.limited_access_dashboard');
        }else{
            return view('users.unlimited_access_dashboard');
        }
    }

}
