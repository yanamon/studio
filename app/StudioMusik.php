<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudioMusik extends Model
{
    protected $table = "tb_studio_musik";
    public function user(){
		return $this->belongsTo('App\User', 'id_user');
    }

}
