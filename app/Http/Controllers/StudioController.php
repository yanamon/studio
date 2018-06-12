<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;
use App\Studio;
use App\Jam;
use App\Booking;
use App\StudioMusik;

use Illuminate\Http\Request;

class StudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function studioPreview($id){
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
            SELECT CURDATE() + INTERVAL 4 DAY ) b) t1      
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

        for($i=0; $i<5; $i++){
            if($i>0) $dates[$i]= date('l',strtotime($dates[$i-1] . "+1 days"));
            $bookings[$i] = array_slice($bookeds,(($i+1)*14)-14,14,false);
         }        

        return view("studio.previewStudio", compact('studio', 'dates', 'jams', 'bookings'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_studio_musik = $id;
        return view("studio.tambah-studio", compact('id_studio_musik'));
    }
    public function createStudio($id)
    {
        $id_studio_musik = $id;
        return view("studio.tambah-studio", compact('id_studio_musik'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'nim' => 'required',
        //     'nama' => 'required',
        //     'alamat' => 'required'
        // ]);
        $studio = new Studio();
        $studio->biaya_booking = $request->biaya;
        $studio->deskripsi_studio = $request->deskripsi;
        $studio->nama_studio = $request->nama_studio;
        $studio->id_studio_musik = $request->id_studio_musik;
        $studio->status = "aktif";

        $nama_foto2 = time().'.'.$request->foto_studio_musik->getClientOriginalExtension();
        $request->foto_studio_musik->move(public_path('image/studio'), $nama_foto2);
        $studio->foto_studio = $nama_foto2; 

        $studio->save();
        
        return redirect('studioRoom/'.$request->id_studio_musik);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function show(Studio $studio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $studio = Studio::find($id);
        return view('studio.edit-studio', compact('studio'));
    }

    public function hapusStudio($id)
    {

        $studio = studio::find($id);
        $studio->status = "tidak aktif";
        $studio->save();
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_studio' => 'required',
            'biaya' => 'required',
            'deskripsi' => 'required',
        ]);
        $studio = Studio::with('studioMusik')->find($id);
        $studio->nama_studio = $request->nama_studio;
        $studio->biaya_booking = $request->biaya;
        $studio->deskripsi_studio = $request->deskripsi;
        if($studio->foto_studio_musik != $request->nama_foto_studio_musik){
            $request->foto_studio_musik->move(public_path('image/studio-musik'), $request->nama_foto_studio_musik);
            $studio->foto_studio = $request->nama_foto_studio_musik; 
        }
        $studio->save();
        return redirect('studioRoom/'.$studio->studioMusik->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studio = studio::find($id);
        $studio->status = "tidak aktif";
        return redirect('studioMusik');
    }
}
