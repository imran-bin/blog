<?php

namespace App\Http\Controllers;

use App\Models\User;
 

class AdminController extends Controller
{
    public function index()
    {
        $user_count=User::all()->count(); 
        return view('Admin.index' ,compact('user_count'));
    }
   
    
}
