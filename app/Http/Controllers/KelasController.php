<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kelas;
use Yajra\DataTables\Datatables;

class KelasController extends Controller
{
    public function list(){

        $kl = Kelas::all();
        return Datatables::of($kl)
            ->addIndexColumn()
            ->addColumn('action', function($kl){
                return '<a onclick="edit('. $kl->id .')" class="btn btn-warning btn-xs"><i class="zmdi zmdi-edit"></i> Ubah</a> '.
                       '<a onclick="del('. $kl->id .')" class="btn btn-danger btn-xs"><i class="zmdi zmdi-delete"></i> Hapus</a>';
            })->make(true);
        }

    public function action(Request $request){
    	
        switch ($request->type) {
            case 'create':
                $this->validate($request,[
                    'kelas' => 'required|unique:kelas,kelas',
                ],[
                    'kelas.required' => 'Kelas Harus Diisi',
                    'kelas.unique' => 'Kelas Telah Ada'
                ]);
                $kl = new Kelas;
                $kl->kelas = $request->kelas;
                $kl->save();

                return response()->json([
                    'message' => 'Berhasil Menambah Data',
                ],200); 
            break;

            case 'update':
                $this->validate($request,[
                    'kelas' => 'required|unique:kelas,kelas,'.$request->id
                ],[
                    'kelas.required' => 'Kelas Harus Diisi',
                    'kelas.unique' => 'Kelas Telah Ada'
                ]);
                $kl = Kelas::find($request->id);
                $kl->kelas = $request->kelas; 
                $kl->save();

                return response()->json([
                    'message' => 'Berhasil Mengubah Data',
                ],200); 
            break;
            
            case 'delete':
                $kl = Kelas::find($request->id)->delete();

                return response()->json([
                    'message' => 'Berhasil Menghapus',
                ],200); 
            break;

             case 'show':
                $kl = Kelas::find($request->id);

                return response()->json($kl,200); 
            break;

            default:
                return response()->json([
                    'error' => 'Bad Request',
                ],400);   
            break;
        }
    }
}
