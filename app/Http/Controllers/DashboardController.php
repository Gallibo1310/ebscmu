<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class DashboardController extends Controller
{
    //

    public function index()
    {
        $totalAllUsers= User::count();
        //$totalStudUsers= User::where('role_name','Student')->count();
        return view('dashboard.home',compact('totalAllUsers'));


    }
}
