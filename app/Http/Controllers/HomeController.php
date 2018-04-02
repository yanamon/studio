<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\EO;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
         return view('index.home');
    }

    public function regisPenyewa(){
        return view("penyewa.registrasi-penyewa");
    }

    public function regisStudio(){
        return view("studio.registrasi-studio");
    }

}
