<?php

namespace App\Http\Controllers\frontenduser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('frontenduser.dashboard');
    }
}
