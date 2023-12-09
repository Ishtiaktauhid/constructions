<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.home');
    }
    public function about(){
        return view('frontend.about');
    }
    public function pages(){
        return view('frontend.pages');
    }
    public function service(){
        return view('frontend.service');
    }
    public function tour(){
        return view('frontend.tour');
    }
    public function testimonial(){
        return view('frontend.testimonial');

    }
    public function destination(){
        return view('frontend.destination');

    }

    public function contact(){
        return view('frontend.contact');
    }
    public function layout(){
        return view('frontend.layout');
    }
}
