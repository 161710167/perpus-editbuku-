<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Siswa;
use Yajra\DataTables\Datatables;

class SiswaController extends Controller
{
    public function list(){

        $ss = Siswa::with('kelas')->get();

        return Datatables::of($ss)
            ->addIndexColumn()
            ->addColumn('action', function($ss){
                return '<a onclick="edit('. $ss->id .')" class="btn btn-warning btn-xs"><i class="zmdi zmdi-edit"></i> Ubah</a> '.
                       '<a onclick="del('. $ss->id .')" class="btn btn-danger btn-xs"><i class="zmdi zmdi-delete"></i> Hapus</a>';
            })->make(true);
    }

        public function action(Request $request){
        
        switch ($request->type) {
            case 'create':
                $this->validate($request,[
                    'no_absen' => 'required',
                    'no_induk' => 'required|unique:siswas,no_induk',
                    'nama' => 'required',
                    'kelas_id' => 'required',
                ],[
                    'no_absen.required' => 'No Absen Harus Diisi',
                    'no_induk.required' => 'No Induk Harus Diisi',
                    'nama.required' => 'Nama Harus Diisi',
                    'kelas_id.required' => 'Kelas Harus Diisi'
                ]);

                $ss = new Siswa;
                $ss->no_absen = $request->no_absen;
                $ss->no_induk = $request->no_induk;
                $ss->nama = $request->nama;
                $ss->kelas_id = $request->kelas_id;
                $ss->save();

                return response()->json([
                    'message' => 'Berhasil Menambah Data',
                ],200); 
            break;

            case 'update':
                $this->validate($request,[
                    'no_absen' => 'required',
                    'no_induk' => 'required',
                    'nama' => 'required',
                    'kelas_id' => 'required',
                    
                ],[
                    'no_absen.required' => 'No Absen Harus Diisi',
                    'no_induk.required' => 'No Induk Harus Diisi',
                    'nama.required' => 'Nama Harus Diisi',
                    'kelas_id.required' => 'Kelas Harus Diisi'
                ]);

                $ss = Siswa::find($request->id);
                $ss->no_absen = $request->no_absen;
                $ss->no_induk = $request->no_induk;
                $ss->nama = $request->nama;
                $ss->kelas_id = $request->kelas_id; 
                $ss->save();

                return response()->json([
                    'message' => 'Berhasil Mengubah Data',
                ],200); 
            break;
            
            case 'delete':
                $ss = Siswa::find($request->id)->delete();

                return response()->json([
                    'message' => 'Berhasil Menghapus',
                ],200); 
            break;

             case 'show':
                $ss = Siswa::find($request->id);

                return response()->json($ss,200); 
            break;

            default:
                return response()->json([
                    'error' => 'Bad Request',
                ],200);   
            break;
        }
    }
}
