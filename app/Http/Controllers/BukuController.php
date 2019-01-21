<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Buku;
use Yajra\DataTables\Datatables;

class BukuController extends Controller
{
    public function list(){

        $bk = Buku::all();

        return Datatables::of($bk)
            ->addIndexColumn()
            ->editColumn('foto',function($bk){
                return '<img class="rounded-square" width="80" height="80" src="'. asset('upload/foto/'.$bk->foto).'">';
                // return '<img src="'.asset('upload/foto/'.$data->foto).'">'
            })
            
            ->addColumn('action', function($bk){
                return '<a onclick="edit('. $bk->id .')" class="btn btn-warning btn-xs"><i class="zmdi zmdi-edit"></i> Ubah</a> '.
                       '<a onclick="del('. $bk->id .')" class="btn btn-danger btn-xs"><i class="zmdi zmdi-delete"></i> Hapus</a>';

            })
            ->rawColumns(['action','foto'])->make(true);
        }

    public function action(Request $request){
    	
        switch ($request->type) {
            case 'create':
                $this->validate($request,[
                    'foto' => 'image|',
                    'judul' => 'required|unique:bukus,judul',
                    'jenis_buku' => 'required|',
                    'kode_buku' => 'required|unique:bukus,kode_buku',
                    'pengarang' => 'required',
                    'tahun_terbit' => 'required',
                    'penerbit' => 'required',
                    'tersedia' => 'required',
                ],[
                    'foto.required' => 'foto Buku Harus Diisi',
                    'judul.required' => 'Judul Buku Harus Diisi',
                    'judul.unique' => 'Judul Buku Telah Ada',
                    'jenis_buku.required' => 'jenis buku Buku Harus Diisi',
                    'kode_buku.required' => 'kode buku Buku Harus Diisi',
                    'kode_buku.unique' => 'kode buku Buku Telah Ada',
                    'pengarang.required' => 'pengarang Buku Harus Diisi',
                    'tahun_terbit.required' => 'tahun terbit Harus Diisi',
                    'penerbit.required' => 'penerbit Buku Harus Diisi',
                    'tersedia.required' => 'tersedia Buku Harus Diisi'
                ]);
                $bk = new Buku;
                // $bk['foto'] = null;
                // if ($request->hasFile('foto')) {
                //     $bk['foto']= '/upload/foto/' .str_slug($bk['foto'], '-').str_random($bk['foto'], '-'). '-'  
                //     .$request->foto->getClientOriginalExtension();
                //     $request->foto->move(public_path('/upload/foto/'), $bk['foto']);
                //     # code...
                // }
                //upload foto
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $destinationPath = public_path().'/upload/foto/';
                $filename = str_random(10).'.'.$file->getClientOriginalName();
                $uploadSuccess = $file->move($destinationPath, $filename);
                $bk->foto = $filename;
                }
                $bk->judul = $request->judul;
                $bk->jenis_buku = $request->jenis_buku;
                $bk->kode_buku = $request->kode_buku;
                $bk->pengarang = $request->pengarang;
                $bk->tahun_terbit = $request->tahun_terbit;
                $bk->penerbit = $request->penerbit;
                $bk->tersedia = $request->tersedia;
                $bk->save();

                return response()->json([
                    'message' => 'Berhasil Menambah Data',
                ],200); 
            break;

            case 'update':
                $this->validate($request,[
                    'foto' => 'image|',
                    'judul' => 'required|',
                    'jenis_buku' => 'required|',
                    'kode_buku' => 'required|',
                    'pengarang' => 'required',
                    'tahun_terbit' => 'required',
                    'penerbit' => 'required',
                    'tersedia' => 'required',
                ],[
                    'foto.required' => 'foto Buku Harus Diisi',
                    'judul.required' => 'Judul Buku Harus Diisi',
                    'jenis_buku.required' => 'jenis buku Buku Harus Diisi',
                    'kode_buku.required' => 'kode buku Buku Harus Diisi',
                    'pengarang.required' => 'pengarang Buku Harus Diisi',
                    'tahun_terbit.required' => 'tahun terbit Harus Diisi',
                    'penerbit.required' => 'penerbit Buku Harus Diisi',
                    'tersedia.required' => 'tersedia Buku Harus Diisi'
                ]);
            //     $bk = Buku::findOrFail($request);
            //     $buku['foto'] =$bk->foto;
            //     if ($request->hasFile('foto')) {
            //         if (!$bk->foto == null){
            //         unlink(public_path($bk->foto));
            //         # code...
            //     }
            //     $buku['foto'] = '/upload/foto/' .str_slug($buku['foto'], '-'). '-'.$request->foto->getClientOriginalExtension();
            //     $request->foto->move(public_path('/upload/foto/'), $buku['foto']);
            // }
            if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = public_path().'/upload/foto/';
            $filename = str_random(10).'. '.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
        //hapus foto lama, jika ada
            if ($bk->foto) {
            $old_foto = $bk->foto;
            $filepath = public_path() . DIRECTORY_SEPARATOR . '/upload/foto'
            . DIRECTORY_SEPARATOR .$bk->foto;
                try {
                File::delete($filepath);
                } catch (FileNotFoundException $e) {
        //file sudah dihapus/tidak ada
                }
            }
        $bk->foto = $filename;
        }
                $bk->judul = $request->judul;
                $bk->jenis_buku = $request->jenis_buku;
                $bk->kode_buku = $request->kode_buku;
                $bk->pengarang = $request->pengarang;
                $bk->tahun_terbit = $request->tahun_terbit;
                $bk->penerbit = $request->penerbit;
                $bk->tersedia = $request->tersedia; 
                $bk->save();

                return response()->json([
                    'message' => 'Berhasil Mengubah Data',
                ],200); 
            break;
            
            case 'delete':
                $bk = Buku::find($request->id)->delete();

                return response()->json([
                    'message' => 'Berhasil Menghapus',
                ],200); 
            break;

             case 'show':
                $bk = Buku::find($request->id);

                return response()->json($bk,200); 
            break;

            default:
                return response()->json([
                    'error' => 'Bad Request',
                ],400);   
            break;
        }
    }
}
