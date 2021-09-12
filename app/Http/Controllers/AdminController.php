<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;


class AdminController extends Controller
{
    //
    public function dashboard(){
        $user_count = DB::table('users')->where('role', 'user')->count();
        
        return view('admin.dashboard', compact('user_count'));
}
}