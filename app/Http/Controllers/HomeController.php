<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // public function afterAuthRedirect()
    // {
    //     return view('users.dashboard');
    // }

    public function adminIndex()
    {   
        $users = new User;             
        $all_user =   $users->userList();  
        return view('admin.dashboard',compact('all_user'));
    }
    public function userIndex()
    {
        return view('users.unlimited_access_dashboard');
    }
    public function limitedUserIndex()
    {
        return view('users.limited_access_dashboard');
    }
}
