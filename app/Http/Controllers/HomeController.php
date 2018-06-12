<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
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
        $studioMusiks = StudioMusik::with(['studio' => function($query){
            $query->min('biaya_booking');
         }])->take(6)->get();
        return view('index.home', compact('studioMusiks')); 
    }

    public function nearStudio(Request $request){
        $lat = $request->lat;
        $lng = $request->lng;

        function get_data($url_par) {
            $ch = curl_init();
            $timeout = 5;
            curl_setopt($ch, CURLOPT_URL, $url_par);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        } 
        $api_key = "AIzaSyBPFFbLQcq3u3L9BqtaKlcyEPs-h4j2RGM";
        $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lng&key=$api_key";
        $html= get_data("$url");
        $data = json_decode($html);
        $result = $data->results[0]->address_components;  
        $location = $result[0]->long_name.", ".$result[1]->long_name.", ".$result[2]->long_name.", ".$result[3]->long_name.", ".$result[4]->long_name;

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
                    // ->with(['studio' => function($query){
                    //     $query->min('biaya_booking');
                    // }])
                    ->take(6)
                    ->get();
        
        $studioMusiks[0]->location = $location;
        return response()->json($studioMusiks);
    //    return Response::json(array(
    //        'studioMusiks' => $studioMusiks
    //    ));
    }

    public function listStudio(Request $request){

        $keyword = $request->keyword;
        
            $harga = $request->harga;
        
        $lokasi2 = $request->lokasi;
        if(isset($request->lokasi)){
            
            $lokasi_array = explode(",",$request->lokasi);
            $lokasi = $lokasi_array[0];
        }

        if(isset($keyword) && isset($lokasi)){
            $studioMusiks = StudioMusik::when($request->keyword, function ($query) use ($request) {
                $query->where('nama_studio_musik', 'like', "%{$request->keyword}%");
            })->where('kota', $lokasi, function ($query) use ($request) {
                $query->orWhere('kecamatan',$lokasi)->orWhere('provinsi',$lokasi)->orWhere('lokasi',$lokasi);
            });
        }
        else if(isset($keyword)){
            $studioMusiks = StudioMusik::when($request->keyword, function ($query) use ($request) {
                $query->where('nama_studio_musik', 'like', "%{$request->keyword}%");
            });
        }
        else if(isset($lokasi)){
            $studioMusiks = StudioMusik::where('kota',$lokasi)->orWhere('kecamatan',$lokasi)->orWhere('provinsi',$lokasi)->orWhere('lokasi',$lokasi);
        }
        else {
            $studioMusiks = StudioMusik::with(['studio' => function($query){
                $query->min('biaya_booking');
            }])->paginate(7);
        }

        if(isset($keyword) || isset($lokasi)){
            $studioMusiks = $studioMusiks->with(['studio' => function($query){
                $query->min('biaya_booking');
             }])->paginate(7);
        }

        foreach($studioMusiks as $i => $studioMusik){
            if(isset($harga)){
                if($harga == 1){
                    if($studioMusik->studio[0]->biaya_booking >= 50000) $studioMusiks->forget($i);
                }
                else if($harga == 2){
                    if($studioMusik->studio[0]->biaya_booking < 50000 || $studioMusik->studio[0]->biaya_booking > 100000) $studioMusiks->forget($i);
                }
                else if($harga == 3){
                    if($studioMusik->studio[0]->biaya_booking < 100000 || $studioMusik->studio[0]->biaya_booking > 200000) $studioMusiks->forget($i);
                }
                else if($harga == 4){
                    if($studioMusik->studio[0]->biaya_booking <= 200000) $studioMusiks->forget($i);
                }
            }
        }
  
       
        return view("index.list-studio", compact('studioMusiks', 'dates', 'keyword', 'lokasi2', 'harga'));
    }

    public function detailStudio($id){
        $studioMusik = StudioMusik::with('user')->find($id);
        $studios = Studio::where('id_studio_musik', $id)->where('status','aktif')->paginate(5);
        return view("index.detail-studio", compact('studioMusik', 'studios'));
    }




    public function regisStudio(){
        return view("studio.registrasi-studio");
    }

    public function regisUser(){
        return view("penyewa.registrasi-penyewa");
    }


    
    public function alreadyOnline(){
        return view("index.already-online");
    }

    public function banned(){
        return view("index.banned");
    }
}
