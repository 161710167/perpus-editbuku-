
<body>
   <div id="Modal" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog">
         <div class="modal-content">
            <form method="post" id="form" enctype="multipart/form-data">

               <div class="modal-body">
                  {{csrf_field()}} {{ method_field('POST') }}
                  <span id="form_tampil"></span>
                  <input type="hidden" name="id" id="id">
                  <div class="form-group">
                     <label>No Pinjam</label>
                     <input type="text" name="no_pinjam" id="no_pinjam" class="form-control" placeholder="Masukan No Pinjam">
                     <span class="help-block has-error no_anggota_error"></span>
                  </div>
                  <div class="form-group">
                    <label>buku</label>
                    <select class="form-control" name="buku_id">
                      @foreach(App\Buku::all() as $data)
                      <option value="{{ $data->id}}">{{ $data->judul }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>siswa</label>
                    <select class="form-control" name="siswa_id">
                      @foreach(App\Siswa::all() as $data)
                      <option value="{{ $data->id}}">{{ $data->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                <div class="form-group">
                  <label>Kelas</label>
                  <select class="form-control" name="kelas_id">
                    @foreach(App\Kelas::all() as $data)
                    <option value="{{ $data->id}}">{{ $data->kelas }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Tanggal Pinjam</label>
                  <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" value="<?php echo Carbon\Carbon::now()->format('Y-m-d') ?>" readonly>
                     <span class="help-block has-error kota_error"></span>
                </div>
                <div class="form-group">
                     <label>Tanggal Kembali</label>
                     <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" >
                     <span class="help-block has-error kota_error" ></span>
                  </div>
                <div class="form-group">
                  <label>Tanggal Harus Kembali</label>
                  <input type="date" name="tgl_harus_kembali" id="tgl_harus_kembali" class="form-control" value="<?php echo Carbon\Carbon::now()->addDays(2)->format('Y-m-d') ?>" readonly>
                     <span class="help-block has-error kota_error"></span>
                </div>
                <div class="modal-footer">
                   <input type="submit" name="submit" id="aksi" value="Simpan" class="btn btn-info" />
                   <input type="button" value="Batal" class="btn btn-default" data-dismiss="modal"/>
                </div>
               </form>
            </div>
         </div>
      </div>
<script type="text/javascript">
</script>
</body>
