<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $table = 'villages'; 
    protected $fillable = ['province_id','name']; 
    public $timestamps = true;

    public function Pemohon(){
        return $this->hasMany('App\Pemohon','kelurahan_id','id');
    }

    public function AhliWaris(){
        return $this->hasMany('App\AhliWaris','tempat_lahir_id','id');
    }
}
