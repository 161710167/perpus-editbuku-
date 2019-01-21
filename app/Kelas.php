<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table ='kelas';
    protected $fillable =['kelas'];
    public $timestamps = true;

    public function Siswa()
    {
    	return $this->hasMany('App\Siswa','kelas_id');
    }}
