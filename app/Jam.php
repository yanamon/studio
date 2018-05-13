<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jam extends Model
{
    protected $table = "tb_jam";

    public function studioMusikBuka(){
      return $this->hasMany('App\StudioMusik', 'jam_buka');
    }
    public function studioMusikTutup(){
      return $this->hasMany('App\StudioMusik', 'jam_tutup');
    }
    public function bookingMulai(){
      return $this->hasMany('App\Booking', 'mulai_booking');
    }
    public function bookingSelesai(){
      return $this->hasMany('App\Booking', 'selesai_booking');
    }
}
