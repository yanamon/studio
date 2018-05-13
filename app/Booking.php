<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = "tb_booking";

    public function jamMulai(){
		  return $this->belongsTo('App\User', 'mulai_booking');
    }

    public function jamSelesai(){
		  return $this->belongsTo('App\User', 'selesai_booking');
    }

    public function studio(){
		  return $this->belongsTo('App\User', 'id_studio');
    }

    public function user(){
		  return $this->belongsTo('App\User', 'id_user');
    }
}
