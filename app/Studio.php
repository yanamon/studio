<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    protected $table = "tb_studio";
    public function studioMusik(){
		return $this->belongsTo('App\StudioMusik', 'id_studio_musik');
    }
}
