<div class="modal" tabindex="-1" role="dialog" id="m_form">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
        <form id="f_buku">
          <?php echo e(csrf_field()); ?>

          <input type="hidden" name="id" id="id">
          <input type="hidden" name="type" id="type">

          <div class="form-group">
          <label for="cc-payment" class="control-label mb-1">Foto</label>
          <br>
            <input type="file"  name="foto" required>
          </div>
          
          <div class="form-group">
             <label class="control-label" style="font: color:blue">Judul Buku</label> 
             <input type="text" name="judul" class="form-control" id="judul_buku" >
          </div>
          <div class="form-group">
             <label class="control-label" style="font: color:blue">Jenis Buku</label> 
             <input type="text" name="jenis_buku" class="form-control" id="jenis_buku" >
          </div>
          <div class="form-group">
             <label class="control-label" style="font: color:blue">Kode Buku</label> 
             <input type="text" name="kode_buku" class="form-control" id="kode_buku" >
          </div>
          <div class="form-group">
             <label class="control-label">Pengarang Buku</label> 
             <input type="text" name="pengarang" class="form-control" id="pengarang">
          </div>
          <div class="form-group">
             <label class="control-label">Tahun Terbit</label> 
             <input type="text" name="tahun_terbit" class="form-control" id="tahun_terbit">
          </div>
          <div class="form-group">
             <label class="control-label">Penerbit</label> 
             <input type="text" name="penerbit" class="form-control number-only" id="penerbit">
          </div>
          <div class="form-group">
             <label class="control-label">Tersedia</label> 
             <input type="text" name="tersedia" class="form-control" id="tersedia">
          </div>
            <button type="reset" style="display: none;" id="reset"></button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="save()"> Simpan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
      </div>
    </div>
  </div>
</div>