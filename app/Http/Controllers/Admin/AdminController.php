<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    
    public function index()
    {   
        $users = new User;              
        $all_user =   $users->userList();  
        return view('admin.dashboard',compact('all_user'));
    }

}
