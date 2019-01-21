<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pinjam_buku extends Model
{
    protected $table ='pinjam_bukus';
    protected $fillable =['buku_id','siswa_id','kelas_id','tgl_pinjam','tgl_harus_kembali','tgl_kembali','hukuman'];
    public $timestamps = true;

    public function Buku()
    {
    	return $this->belongsTo('App\Buku','buku_id');
    }

    public function Siswa()
    {
    	return $this->belongsTo('App\Siswa','siswa_id');
    }

    public function Kelas()
    {
        return $this->belongsTo('App\Kelas','kelas_id');
    }
}
