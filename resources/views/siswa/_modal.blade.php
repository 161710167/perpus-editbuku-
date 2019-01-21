<div class="modal" tabindex="-1" role="dialog" id="m_form">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
        <form id="f_siswa">
          {{csrf_field()}}
          <input type="hidden" name="id" id="id">
          <input type="hidden" name="type" id="type">
          <div class="form-group">
             <label class="control-label">No Absen</label> 
             <input type="text" name="no_absen" class="form-control" placeholder="Masukan No Absen" id="no_absen">
          </div>
          <div class="form-group">
             <label class="control-label">No Induk</label> 
             <input type="text" name="no_induk" class="form-control" placeholder="Masukan No Induk" id="no_induk">
          </div>
          <div class="form-group">
             <label class="control-label">Nama</label> 
             <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Siswa" id="nama">
          </div>
          <div class="form-group">
                <label>Kelas</label>
              <select class="form-control select2" name="kelas_id" id="nama_kelas">
                @foreach(App\Kelas::all() as $data)
                <option value="{{$data->id}}">{{$data->kelas}}</option>
                @endforeach
              </select>
            </div>
            <button type="reset" style="display: none;" id="reset"></button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="save()">Simpan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>