<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    protected $table = "tb_penyewa";
    public function user(){
		return $this->belongsTo('App\User', 'id_user');
    }

}
