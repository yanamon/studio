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

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //defining our middleware for this controller
        $this->middleware('auth');
    }

    public function bookStudio($id){
        $studio = Studio::find($id);
        $jams = Jam::all();
        date_default_timezone_set('Asia/Brunei');
        $dates[0] = date('l');  
        $bookeds = DB::select('
            SELECT t1.id , t1.jam, t2.mulai_booking, t3.selesai_booking, t1.tgl_booking
            FROM
            (SELECT j.`id`, j.`jam`, tgl_booking FROM tb_jam j,
            (SELECT CURDATE() AS tgl_booking UNION ALL 
            SELECT CURDATE() + INTERVAL 1 DAY UNION ALL 
            SELECT CURDATE() + INTERVAL 2 DAY UNION ALL 
            SELECT CURDATE() + INTERVAL 3 DAY UNION ALL 
            SELECT CURDATE() + INTERVAL 4 DAY UNION ALL 
            SELECT CURDATE() + INTERVAL 5 DAY UNION ALL 
            SELECT CURDATE() + INTERVAL 6 DAY) b) t1      
            LEFT JOIN
            (SELECT id_studio, mulai_booking, tgl_booking FROM tb_booking WHERE id_studio = '.$id.') t2
            ON t1.id = t2.mulai_booking AND t1.tgl_booking = t2.tgl_booking            
            LEFT JOIN
            (SELECT id_studio, selesai_booking, tgl_booking FROM tb_booking WHERE id_studio = '.$id.') t3
            ON t1.id = t3.selesai_booking AND t1.tgl_booking = t3.tgl_booking
            ORDER BY  t1.tgl_booking, t1.id
        ');

        foreach($bookeds as $i => $booked){
            if($i>0){
                if($previous_mulai != NULL && $booked->selesai_booking == NULL) 
                    $booked->mulai_booking = $booked->id ;
            }
            $previous_mulai = $booked->mulai_booking;
        }

        for($i=0; $i<7; $i++){
            if($i>0) $dates[$i]= date('l',strtotime($dates[$i-1] . "+1 days"));
            $bookings[$i] = array_slice($bookeds,(($i+1)*48)-48,48,false);
         }     

        return view("index.book-studio-1", compact('studio', 'dates', 'jams', 'bookings'));
    }

    public function rekapBooking(Request $request)
    {
        $this->validate($request,[
            'mulai_booking' => 'required',
            'selesai_booking' => 'required',
            'tgl_booking' => 'required',
            'id_studio' => 'required',
        ]);
        
        $mulai_booking = $request->mulai_booking;
        $selesai_booking = $request->selesai_booking;
        $tgl_booking = $request->tgl_booking;

        $id_studio = $request->id_studio;
        $studioMusik = StudioMusik::with('Studio')
            ->whereHas('Studio', function($query) use($id_studio){
            $query->where('id', $id_studio);
        })->first();
        $studio = Studio::find($id_studio);
        $lama_booking = ( strtotime($selesai_booking) - strtotime($mulai_booking) )/3600;
        $biaya_booking = $studio->biaya_booking * $lama_booking;

        return view("index.book-studio-2", compact('studioMusik', 'studio', 'tgl_booking', 
        'mulai_booking', 'selesai_booking', 'biaya_booking', 'id_studio'));
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $mulai_booking = Jam::where('jam', $request->mulai_booking)->first();
        $selesai_booking = Jam::where('jam', $request->selesai_booking)->first();
        $tgl_booking = substr($request->hari_tgl_booking,-10);

        $booking = new Booking();
        $booking->id_studio = $request->id_studio;
        $booking->id_user = $request->id_user;
        $booking->tgl_booking = $tgl_booking;
        $booking->mulai_booking = $mulai_booking->id;
        $booking->selesai_booking = $selesai_booking->id;
        $booking->biaya_booking = $request->biaya_booking;
        $booking->save();
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
