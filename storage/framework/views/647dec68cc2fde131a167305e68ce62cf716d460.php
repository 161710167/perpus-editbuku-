<body>
   <div id="Modal" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog">
         <div class="modal-content">
            <form method="post" id="form" enctype="multipart/form-data">
               <div class="modal-body">
                  <?php echo e(csrf_field()); ?> <?php echo e(method_field('POST')); ?>

                  <span id="form_tampil"></span>
                  <input type="hidden" name="id" id="id">
                   <div class="form-group">
                  <label>Buku</label>
              <select class="form-control select2" name="buku_id">
                <?php $__currentLoopData = App\Buku::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($data->id); ?>"><?php echo e($data->judul); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
             <div class="form-group">
                <label>Kelas</label>
              <select class="form-control select2" name="kelas_id" id="nama_kelas">
                <?php $__currentLoopData = App\Kelas::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($data->id); ?>"><?php echo e($data->kelas); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
             <div class="form-group">
                  <label>Nama Siswa</label>
              <select class="form-control select2" name="siswa_id" id="nama_siswa">
              </select>
            </div>
                <div class="form-group">
                  <label>Tanggal Pinjam</label>
                  <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" value="<?php echo Carbon\Carbon::now()->format('Y-m-d') ?>" readonly>
                     <span class="help-block has-error kota_error"></span>
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
