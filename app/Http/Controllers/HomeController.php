<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pinjam_buku;
use App\Pengujung;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku_dipinjam = Pinjam_buku::where('tgl_pinjam',null)->count();
        $buku_dipinjam = Pinjam_buku::wheremonth('tgl_pinjam', date('m'))->count();
        $buku_dikembalikan = Pinjam_buku::where('tgl_kembali','!=',null)->count();
        $buku_dikembalikan = Pinjam_buku::wheremonth('tgl_kembali', date('m'))->count();
        $pengunjung = Pengujung::where('tgl_kunjung','!=',null)->count();
        $pengunjung = Pengujung::wheremonth('tgl_kunjung', date('m'))->count();
        return view('home',compact('buku_dipinjam','buku_dikembalikan','pengunjung'));
    }
}
