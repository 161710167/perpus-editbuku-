<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities'; 
    protected $fillable = ['province_id','name']; 
    public $timestamps = true;

    public function Pemohon(){
        return $this->hasMany('App\Pemohon','kabupaten_id','id');
    }

    public function AhliWaris(){
        return $this->hasMany('App\AhliWaris','kabupaten_id','id');
    }
}
