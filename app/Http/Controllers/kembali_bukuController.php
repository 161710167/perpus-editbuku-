<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pinjam_buku;
use App\Buku;
use App\Siswa;
use App\Kelas;
use Carbon\Carbon;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Traits\SessionFlash;
use DB;
use Excel;

class kembali_bukuController extends Controller
{
     public function jsonpengembalian() {

        $kembali = Pinjam_buku::where('tgl_kembali','!=',null);
        $kembali = Pinjam_buku::wheremonth('tgl_kembali', date('m'))->get();
        return Datatables::of($kembali)
        ->addColumn('buku', function($kembali){
            return $kembali->Buku->judul;
        })
        ->addColumn('siswa', function($kembali){
            return $kembali->Siswa->nama;
        })
        ->addColumn('kelas', function($kembali){
            return $kembali->Kelas->kelas;
        })
        ->addIndexColumn()
        
        ->editColumn('hukuman', function($kembali){
            if ($kembali->tgl_kembali > $kembali->tgl_harus_kembali) {
                return '<font color="red"><b>TERLAMBAT</font></b>';
            }else{
                return '<font color="blue"><b>Tepat Waktu</font></b>';
            }
         
            })
        ->rawColumns(['action','buku','siswa','kelas','hukuman'])->make(true);
    }
    public function index() {
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        $buku = Buku::all();
        return view('Pinjam_buku.index2');
    }
    public function store(Request $request) {
        $this->validate($request, [
            'buku_id' => 'required',
            'siswa_id' => 'required',
            'kelas_id' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'tgl_harus_kembali' => 'required', 
        ],[
            'buku_id.required'=>'Buku harus diisi',
            'siswa_id.required'=>'Nama Siswa harus diisi',
            'kelas_id.required'=>'Kelas harus diisi',
            'tgl_pinjam.required'=>'Tanggal harus diisi',
            'tgl_kembali.required'=>'Tanggal harus diisi',
            'tgl_harus_kembali.required'=>'Tanggal harus diisi'  
        ]);
        $data = new Pinjam_buku;
        $data->buku_id = $request->buku_id;
        $data->siswa_id = $request->siswa_id;
        $data->kelas_id = $request->kelas_id;
        $data->tgl_pinjam = $request->tgl_pinjam;
        $data->tgl_kembali = $request->tgl_kembali;
        $data->tgl_harus_kembali = $request->tgl_harus_kembali;
        $data->save();
        return response()->json(['success'=>true]);
    }
     public function export_pengembalian(){
        $pengembalians = DB::table('pinjam_bukus')->get();
        $pengembalians = Pinjam_buku::with(['buku','siswa','kelas'])->wheremonth('tgl_kembali', date('m'))->get();
        $datapengembalians = "";
            if(count($pengembalians) >0 ){
                $datapengembalians .='<table border="1">
                <tr>
                    <th>Judul Buku</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Tanggal Harus Kembali</th>
                    <th> Status</th>
                </tr>';
            foreach ($pengembalians as $pengembalian) {
                $datapengembalians .= '
                <tr>
                    <td>'.$pengembalian->buku->judul.'</td>
                    <td>'.$pengembalian->siswa->nama.'</td>
                    <td>'.$pengembalian->kelas->kelas.'</td>
                    <td>'.$pengembalian->tgl_pinjam.'</td>
                    <td>'.$pengembalian->tgl_kembali.'</td>
                    <td>'.$pengembalian->tgl_harus_kembali.'</td>
                    <td>'.$pengembalian->hukuman.'</td>
                </tr>';
            }
            $datapengembalians .='</table>';
        }
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=Laporan Buku.xls');
        echo $datapengembalians;
        // return $pengujungs;
    }

}
