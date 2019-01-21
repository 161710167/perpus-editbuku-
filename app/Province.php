<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces'; 
    protected $fillable = ['id','name']; 
    public $timestamps = true;

    public function Pemohon(){
        return $this->hasMany('App\Pemohon','provinsi_id','id');
    }

    public function AhliWaris(){
        return $this->hasMany('App\AhliWaris','provinsi_id','id');
    }
}
