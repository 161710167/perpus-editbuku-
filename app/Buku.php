<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table ='bukus';
    protected $fillable =['foto','judul','jenis_buku','kode_buku','pengarang','tahun_terbit','penerbit','tersedia'];
    public $timestamps = true;

    public function Pinjam()
    {
    	return $this->hasMany('App\Pinjam_buku','buku_id');
    }}
