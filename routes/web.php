<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Config::set('debugbar.enabled', false);
Route::get('/', function () {
	// return redirect('/login');
     return view('frontend.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'],function(){

	//kelas
	Route::get('kelas', function(){
		return view('kelas.index');
	});
	Route::get('list/kelas','KelasController@list');
	Route::post('action/kelas','KelasController@action');

	//Jenis Buku
	Route::get('jenisbuku', function(){
		return view('jenisbuku.index');
	});
	Route::get('list/jenisbuku','JenisbukuController@list');
	Route::post('action/jenisbuku','JenisbukuController@action');

	//buku
	Route::get('buku', function(){
		return view('buku.index');
	});
	Route::get('list/buku','BukuController@list');
	Route::post('action/buku','BukuController@action');

	//siswa
	Route::get('siswa', function(){
		return view('siswa.index');
	});
	Route::get('list/siswa','SiswaController@list');
	Route::post('action/siswa','SiswaController@action');

	//pinjam
	Route::get('/jsonpinjam','Pinjam_bukuController@jsonpinjam');
	Route::resource('/pinjam','Pinjam_bukuController');
	Route::post('storepinjam','Pinjam_bukuController@store')->name('tambah');
	Route::post('pinjam/edit/{id}','Pinjam_bukuController@update');
	Route::get('pinjam/getedit/{id}','Pinjam_bukuController@edit');

	//pengembalian
	Route::get('/jsonpengembalian','Kembali_bukuController@jsonpengembalian');
	Route::get('/pengembalian','Kembali_bukuController@index');
	Route::post('storepengembalian','Kembali_bukuController@store')->name('tambah');

	//Pengunjung
	Route::get('/jsonkunjung','PengunjungController@jsonkunjung');
	Route::get('/pengunjung','PengunjungController@index');
	Route::post('store','PengunjungController@store')->name('tambah');
	Route::get('return_book/{id}','Pinjam_bukuController@return_book');

	//Export Peminjaman
	Route::get('export/peminjaman','Pinjam_bukuController@export_peminjaman')->name('peminjaman.export');

	//Export Pengembalian
	Route::get('export/pengembalian','Kembali_bukuController@export_pengembalian')->name('pengembalian.export');

	//Export Pengunjung
	Route::get('export/pengunjung','PengunjungController@export_pengunjung')->name('pengunjung.export');

	//Export Siswa
	Route::get('export/siswa','SiswaController@export_siswa')->name('siswa.export');

	});
	Route::get('get_siswa/{kelas_id}','Pinjam_bukuController@get_siswa');
	



	