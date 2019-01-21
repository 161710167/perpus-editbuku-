<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table ='siswas';
    protected $fillable =['no_absen','no_induk','nama','kelas_id'];
    public $timestamps = true;

    public function Pinjam_buku()
    {
    	return $this->hasMany ('App\Pinjam_buku','siswa_id');
    }
    public function Kelas()
    {
    	return $this->belongsTo('App\Kelas','kelas_id');
    }
}
