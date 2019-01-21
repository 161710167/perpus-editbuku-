<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengujung extends Model
{
    protected $table ='pengujungs';
    protected $fillable =['kelas_id','siswa_id','tgl_kunjung'];
    public $timestamps = true;

    public function Kelas()
    {
        return $this->belongsTo('App\Kelas','kelas_id');
    }

    public function Siswa()
    {
    	return $this->belongsTo('App\Siswa','siswa_id');
    }
}
