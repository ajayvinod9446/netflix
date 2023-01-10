<?php

namespace App\Http\Controllers;
use App\Models\movies;
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
        $movies = movies::all();
        
        return view('user.userHome',compact('movies'));
    }
    public function adminHome()
    {
        return view('admin.adminHome');
    }
}
