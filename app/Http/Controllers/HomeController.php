<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Studio;
use App\Jam;
use App\Booking;
use App\StudioMusik;
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
        $studioMusiks = StudioMusik::take(6)->get();
        return view('index.home', compact('studioMusiks')); 
    }

    public function nearStudio(Request $request){
        $lat = $request->lat;
        $lng = $request->lng;
        $radius = 10000;
        $unit = "km";

        $unit = ($unit === "km") ? 6378.10 : 3963.17;
        $lat = (float) $lat;
        $lng = (float) $lng;
        $radius = (double) $radius;

        $studioMusiks = DB::table('tb_studio_musik')
                    ->having('distance','<=',$radius)
                    ->select(DB::raw("*,
                                ($unit * ACOS(COS(RADIANS($lat))
                                    * COS(RADIANS(lat))
                                    * COS(RADIANS($lng) - RADIANS(lng))
                                    + SIN(RADIANS($lat))
                                    * SIN(RADIANS(lat)))) AS distance"))
                    ->orderBy('distance','asc')
                    ->take(6)
                    ->get();
        return response()->json($studioMusiks);
    }

    public function listStudio(){
        $studioMusiks = StudioMusik::all();
        return view("index.list-studio", compact('studioMusiks'));
    }

    public function detailStudio($id){
        $studioMusik = StudioMusik::find($id);
        $studios = Studio::where('id_studio_musik', $id)->get();
        return view("index.detail-studio", compact('studioMusik', 'studios'));
    }




    public function regisStudio(){
        return view("studio.registrasi-studio");
    }

    

}
