<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\User;
use App\StudioMusik;
use App\Studio;
use App\Booking;
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
       $studioMusiks = StudioMusik::where('id_user', Auth::user()->id)->get();
        return view("studio.crudStudioMusik", compact('studioMusiks'));
    }

    public function studioMusikPreview($id)
    {
        $studioMusik = StudioMusik::with('user')->find($id);
        $studios = Studio::where('id_studio_musik', $id)->where('status','aktif')->paginate(5);
        return view("studio.previewStudioMusik", compact('studioMusik', 'studios'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("studio.tambah-studioMusik");
    }

    public function studioRoom($id)
    {
        $studioMusik = StudioMusik::find($id);
        $studios = Studio::where('id_studio_musik', $id)->where('status', "aktif")->get();
        return view("studio.crudStudio", compact('studios','studioMusik'));
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
            'foto_studio_musik' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'lokasi' => 'required'

        ]);
        $user = User::where('email', $request->email)->first();
        if(empty($user)){
            $user = new User();
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->name = $request->nama_penyewa;
            $user->telp = $request->telp;
            $user->previlege = 1;
            $user->verified = 0; 
            $user->confirmed = 0; 
            $user->save();
        }
        else {
            if($user->previlege==0 && Hash::make($request->password)==$user->password){
                $user->previlege = 1;
                $user->verified = 0; 
                $user->confirmed = 0; 
                $user->save();
            }
            else return redirect('regisStudio');
        }
       

        $studioMusik = new StudioMusik();
        $studioMusik->id_user = $user->id;
        $studioMusik->nama_studio_musik = $request->nama_studio_musik;
        $studioMusik->telp_studio = $request->telp;
        $studioMusik->alamat = $request->alamat;  
        $studioMusik->no_ktp = $request->no_ktp;     
        
        $nama_foto = time().'.'.$request->foto_ktp->getClientOriginalExtension();
        $request->foto_ktp->move(public_path('image/ktp'), $nama_foto);
        $studioMusik->foto_ktp = $nama_foto; 

        $nama_foto2 = time().'.'.$request->foto_studio_musik->getClientOriginalExtension();
        $request->foto_studio_musik->move(public_path('image/studio-musik'), $nama_foto2);
        $studioMusik->foto_studio_musik = $nama_foto2; 


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
        return redirect('/studioMusik');
    }

    public function store2(Request $request)
    {
        $this->validate($request,[
            'nama_studio_musik' => 'required',
            'telp' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'lokasi' => 'required'

        ]);

        $studioMusik = new StudioMusik();
        $studioMusik->id_user = Auth::user()->id;
        $studioMusik->nama_studio_musik = $request->nama_studio_musik;
        $studioMusik->telp_studio = $request->telp;

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

       
        $nama_foto2 = time().'.'.$request->foto_studio_musik->getClientOriginalExtension();
        $request->foto_studio_musik->move(public_path('image/studio-musik'), $nama_foto2);
        $studioMusik->foto_studio_musik = $nama_foto2; 
        $studioMusik->save();

        return redirect('/studioMusik');
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
    public function edit($id)
    {
        $studioMusik = StudioMusik::find($id);
        return view('studio.edit-studioMusik', compact('studioMusik'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_studio_musik' => 'required',
            'telp' => 'required',
            'lokasi' => 'required',
        ]);
        $studioMusik = StudioMusik::find($id);
        $studioMusik->nama_studio_musik = $request->nama_studio_musik;
        $studioMusik->telp_studio = $request->telp;
        $studioMusik->lokasi = $request->lokasi;

        if($studioMusik->foto_studio_musik != $request->nama_foto_studio_musik){
            $request->foto_studio_musik->move(public_path('image/studio-musik'), $request->nama_foto_studio_musik);
            $studioMusik->foto_studio_musik = $request->nama_foto_studio_musik; 
        }
        $studioMusik->save();

        return redirect('studioMusik');
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

    public function selesaiBooking(Request $request)
    {
        $id_studio_musik = $request->id_studio_musik;
        if(isset($id_studio_musik))
        $bookings = DB::select('
        SELECT b.id, nama_studio_musik, nama_studio, u.`name`, tgl_booking, j.jam AS mulai_booking, j2.jam AS selesai_booking, b.biaya_booking, b.`status`
        FROM tb_booking b
        INNER JOIN users u ON b.`id_user` = u.`id`
        INNER JOIN tb_jam j  ON b.`mulai_booking` = j.`id`
        INNER JOIN tb_jam j2  ON b.`selesai_booking` = j2.`id`
        INNER JOIN tb_studio s ON b.`id_studio` = s.`id`
        INNER JOIN tb_studio_musik sm ON s.`id_studio_musik` = sm.`id`
        INNER JOIN users u2 ON u2.`id` = sm.`id_user`
        WHERE tgl_booking >= CURDATE() AND u2.`id` = '. Auth::user()->id.' 
        AND sm.id ='.$id_studio_musik.'
        ORDER BY `status`, tgl_booking, j.id
        ');
        else
        $bookings = DB::select('
        SELECT b.id, nama_studio_musik, nama_studio, u.`name`, tgl_booking, j.jam AS mulai_booking, j2.jam AS selesai_booking, b.biaya_booking, b.`status`
        FROM tb_booking b
        INNER JOIN users u ON b.`id_user` = u.`id`
        INNER JOIN tb_jam j  ON b.`mulai_booking` = j.`id`
        INNER JOIN tb_jam j2  ON b.`selesai_booking` = j2.`id`
        INNER JOIN tb_studio s ON b.`id_studio` = s.`id`
        INNER JOIN tb_studio_musik sm ON s.`id_studio_musik` = sm.`id`
        INNER JOIN users u2 ON u2.`id` = sm.`id_user`
        WHERE tgl_booking >= CURDATE() AND u2.`id` = '. Auth::user()->id.' 
        ORDER BY `status`, tgl_booking, j.id
        ');
        
        $studioMusiks = StudioMusik::where('id_user', Auth::user()->id)->get();
        return view("studio.selesaiBooking", compact('bookings', 'studioMusiks', 'id_studio_musik'));
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
