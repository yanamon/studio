<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudioMusik extends Model
{
    protected $table = "tb_studio_musik";
    public function user(){
		  return $this->belongsTo('App\User', 'id_user');
    }

    public function jamBuka(){
		  return $this->belongsTo('App\Jam', 'jam_buka');
    }

    public function jamTutup(){
		  return $this->belongsTo('App\Jam', 'jam_tutup');
    }

    public function studio(){
      return $this->hasMany('App\Studio', 'id_studio_musik');
    }

    public function savedStudio(){
      return $this->hasMany('App\SavedStudio', 'id_studio_musik');
    }

    public function gallery(){
      return $this->hasMany('App\Gallery', 'id_studio_musik');
    }
}
