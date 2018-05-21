<?php

namespace App\Http\Controllers;

use App\User;
use App\StudioMusik;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

use App\Mail\VerifyEmail;
use Crypt;
use Mail;

class StudioMusikController extends Controller
{
  
    public function __construct()
    {
        //defining our middleware for this controller
        $this->middleware('auth',['except' => [
            'store',
            'verify',
        ]]);
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("studio.dashboard");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_studio_musik' => 'required',
            'telp' => 'required',
            'no_ktp' => 'required',
            'foto_ktp' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'lokasi' => 'required'

        ]);
        $user = User::find($request->id);
        $user->previlege = 1;
        $user->verified = 0; 
        $user->confirmed = 0; 
        $user->save();

        $studioMusik = new StudioMusik();
        $studioMusik->id_user = $request->id;
        $studioMusik->nama_studio_musik = $request->nama_studio_musik;
        $studioMusik->telp_studio = $request->telp;
        $studioMusik->alamat = $request->alamat;  
        $studioMusik->no_ktp = $request->no_ktp;     
        
        $nama_foto = time().'.'.$request->foto_ktp->getClientOriginalExtension();
        $request->foto_ktp->move(public_path('image/ktp'), $nama_foto);
        $studioMusik->foto_ktp = $nama_foto; 

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
        $lat = $request->lat;
        $lng = $request->lng;
        $api_key = "AIzaSyBPFFbLQcq3u3L9BqtaKlcyEPs-h4j2RGM";
        $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lng&key=$api_key";
        $html= get_data("$url");
        $data = json_decode($html);
        $result = $data->results[0]->address_components;
        $kecamatan = $result[2]->long_name;
        $kota = $result[3]->long_name;
        $provinsi = $result[4]->long_name;        

        $studioMusik->lokasi = $request->lokasi;
        $studioMusik->kecamatan = $kecamatan; 
        $studioMusik->kota = $kota; 
        $studioMusik->provinsi = $provinsi; 
        $studioMusik->lat = $lat;
        $studioMusik->lng = $lng; 
        $studioMusik->save();
        Mail::to($user->email)->send(new VerifyEmail($user));
        Auth::loginUsingId($user->id);
        return redirect('/');
    }

    public function verify()
    {
        if (empty(request('token'))) {
            // if token is not provided
            return redirect()->route('studioMusik.create');
        }
        // decrypt token as email
        $decryptedEmail = Crypt::decrypt(request('token'));
        // find user by email
        $user = User::whereEmail($decryptedEmail)->first();
        if ($user->verified == 1) {
            return redirect('/studioMusik');
        }
        // otherwise change user status to "activated"
        $user->verified = '1';
        $user->save();
        // autologin
        Auth::loginUsingId($user->id);
        return redirect('/studioMusik');
    }

    public function resendVerifikasi(){
        Mail::to(Auth::user()->email)->send(new VerifyEmail(Auth::user()));
        return redirect()->back();
    }

    public function regisUlangStudio(){
        return view("studio.registrasi-studio-ulang");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\StudioMusik  $studioMusik
     * @return \Illuminate\Http\Response
     */
    public function show(StudioMusik $studioMusik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudioMusik  $studioMusik
     * @return \Illuminate\Http\Response
     */
    public function edit(StudioMusik $studioMusik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudioMusik  $studioMusik
     * @return \Illuminate\Http\Response
     */
    public function updateStudio(Request $request)
    {
        $this->validate($request,[
            'nama_studio_musik' => 'required',
            'telp' => 'required',
            'no_ktp' => 'required',
            'foto_ktp' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'lokasi' => 'required'

        ]);
        $user = User::find($request->id);
        $user->previlege = 1;
        $user->verified = 0; 
        $user->confirmed = 0; 
        $user->save();

        $studioMusik = StudioMusik::where('id_user', $user->id)->first();
        $studioMusik->id_user = $request->id;
        $studioMusik->nama_studio_musik = $request->nama_studio_musik;
        $studioMusik->telp_studio = $request->telp;
        $studioMusik->alamat = $request->alamat;  
        $studioMusik->no_ktp = $request->no_ktp;     
        
        $nama_foto = time().'.'.$request->foto_ktp->getClientOriginalExtension();
        $request->foto_ktp->move(public_path('image/ktp'), $nama_foto);
        $studioMusik->foto_ktp = $nama_foto; 

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
        $lat = $request->lat;
        $lng = $request->lng;
        $api_key = "AIzaSyBPFFbLQcq3u3L9BqtaKlcyEPs-h4j2RGM";
        $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lng&key=$api_key";
        $html= get_data("$url");
        $data = json_decode($html);
        $result = $data->results[0]->address_components;
        $kecamatan = $result[2]->long_name;
        $kota = $result[3]->long_name;
        $provinsi = $result[4]->long_name;        

        $studioMusik->lokasi = $request->lokasi;
        $studioMusik->kecamatan = $kecamatan; 
        $studioMusik->kota = $kota; 
        $studioMusik->provinsi = $provinsi; 
        $studioMusik->lat = $lat;
        $studioMusik->lng = $lng; 
        $studioMusik->save();
        Mail::to($user->email)->send(new VerifyEmail($user));
        Auth::loginUsingId($user->id);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudioMusik  $studioMusik
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudioMusik $studioMusik)
    {
        //
    }


}
