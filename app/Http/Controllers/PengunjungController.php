<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengujung;
use App\Kelas;
use App\Siswa;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTables;
use DB;
use Excel;
class PengunjungController extends Controller
{

	public function jsonkunjung() {
        
        $kunjung = Pengujung::all();
        $kunjung = Pengujung::wheremonth('tgl_kunjung', date('m'))->get();
        return Datatables::of($kunjung)

        ->addColumn('kelas', function($kunjung){
            return $kunjung->Kelas->kelas;
        })
        ->addColumn('siswa', function($kunjung){
            return $kunjung->Siswa->nama;
        })
        ->addIndexColumn()
        ->rawColumns(['kelas','siswa'])->make(true);
    }

    public function index() {
    	$kelas = Kelas::all();
        $siswa = Siswa::all();
        return view('pengunjung.index',compact('kelas','siswa'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'kelas_id' => 'required',
            'siswa_id' => 'required',
            'tgl_kunjung' => 'required', 
        ],[
            'kelas_id.required'=>':Kelas harus diisi',
            'siswa_id.required'=>':Nama Siswa harus diisi',
            'tgl_kunjung.required'=>':Tanggal harus diisi'
            
        ]);
        $data = new Pengujung;
        $data->kelas_id = $request->kelas_id;
        $data->siswa_id = $request->siswa_id;
        $data->tgl_kunjung = $request->tgl_kunjung;
        $data->save();

        return response()->json(['success'=>true]);
    }

    public function get_siswa($kelas_id){
        $siswa = Siswa::where('kelas_id',$kelas_id)->get();
        return $siswa;
    }

    public function export_pengunjung(){
        $pengujungs = DB::table('pengujungs')->get();
        $pengujungs = Pengujung::with(['kelas','siswa'])->get();
        $pengujungs = Pengujung::wheremonth('tgl_kunjung', date('m'))->get();

        $datapengunjungs = "";
            if(count($pengujungs) >0 ){
                $datapengunjungs .='<table border="1">
                <tr>
                    <th>Kelas</th>
                    <th>Siswa</th>
                    <th>Tanggal Kunjung</th>        
                </tr>';
            foreach ($pengujungs as $pengujung) {
                $datapengunjungs .= '
                <tr>
                    <td>'.$pengujung->kelas->kelas.'</td>
                    <td>'.$pengujung->siswa->nama.'</td>
                    <td>'.$pengujung->tgl_kunjung.'</td>
                    
                </tr>';
            }
            $datapengunjungs .='</table>';
        }
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=Laporan Pengunjung.xls');
        echo $datapengunjungs;
        // return $pengujungs;
    }
}
