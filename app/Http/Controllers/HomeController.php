<?php

namespace App\Http\Controllers;

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
        // $this->middleware('auth');
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
    public function admin(){
        return view('admins');
    }
    public function user(){
        return view('users');
    }
    public function book(){
        return view('books') ;
    }
    public function category(){
        return view('categories') ;
    }

}
