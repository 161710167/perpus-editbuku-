<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
     protected $table = 'districts'; 
    protected $fillable = ['id','city_id','name']; 
    public $timestamps = true;

    public function Pemohon(){
        return $this->hasMany('App\Pemohon','kecamatan_id','id');
    }
    public function AhliWaris(){
        return $this->hasMany('App\AhliWaris','kecamatan_id','id');
    }
}
