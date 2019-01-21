@extends('layouts.backend')

@push('styles')
<link rel="stylesheet" href="{{asset('vendors/bower_components/lightgallery/dist/css/lightgallery.min.css')}}">

<style type="text/css">
  .table thead tr th{
    vertical-align: middle;
    text-align: center;
  }
  .table tbody tr td{
    vertical-align: middle;
    text-align: center;
  }

  #data th, #data td {
    font-size: 11px;
  }
  .text-danger 
  {
    text-transform:capitalize;
  }
  .fc-time{
      display: none;
  }
</style>
<style type="text/css">
</style>
@endpush

@section('title')
    Data Pengembalian Buku
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <h2 class="card-header">Pengembalian Buku
            </h2>
            <div class="card-body">
                <table id="myTable" class="table table-bordered">
                    <thead class="thead-default">
                        <tr>
                            <th>No</th>
                            <th>Buku</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Tanggal Harus Kembali </th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('Pinjam_buku.modal2')
@endsection
@push('scripts')

<!-- Vendors: Data tables -->
<script src="{{asset('vendors/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('vendors/bower_components/jszip/dist/jszip.min.js')}}"></script>
<script src="{{asset('vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('vendors/bower_components/lightgallery/dist/js/lightgallery-all.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/jquery.uploadPreview.min.js')}}"></script>
<script type="text/javascript">
         $(document).ready(function() {
          $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/jsonpengembalian',
            columns:[
                  {data: 'DT_Row_Index', name: 'DT_Row_Index', orderable: false, searchable: false},
                  { data: 'buku'},
                  { data: 'siswa'},
                  { data: 'kelas'},
                  { data: 'tgl_pinjam', name: 'tgl_pinjam' },
                  { data: 'tgl_kembali', name: 'tgl_kembali' },
                  { data: 'tgl_harus_kembali', name: 'tgl_harus_kembali' },
                  { data: 'hukuman' }
                  
              ],
            });
          $('#Tambah').click(function(){
            $('#Modal').modal('show');
            $('.modal-title').text('Add Data');
            $('#aksi').val('Tambah');
            $('.select-dua').select2();
            state = "insert";
            });
           $('#Modal').on('hidden.bs.modal',function(e){
            $(this).find('#form')[0].reset();
            $('span.has-error').text('');
            $('.form-group.has-error').removeClass('has-error');
            });
          $('#form').submit(function(e){
            $.ajaxSetup({
              header: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
              }
            });
            //menambah kan data
            e.preventDefault();
            if (state == 'insert'){
              $.ajax({
                type: "POST",
                url: "{{url ('/storepengembalian')}}",
                data: new FormData(this),
               // data: $('#student_form').serialize(),
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (data){
                  console.log(data);
                  swal({
                      title:'Success Tambah!',
                      text: data.message,
                      type:'success',
                      timer:'2000'
                    });
                  $('#Modal').modal('hide');
                  $('#myTable').DataTable().ajax.reload();
                },
                //menampilkan validasi error
                error: function (data){
                  $('input').on('keydown keypress keyup click change', function(){
                  $(this).parent().removeClass('has-error');
                  $(this).next('.help-block').hide()
                });
                  var coba = new Array();
                  console.log(data.responseJSON.errors);
                  $.each(data.responseJSON.errors,function(name, value){
                    console.log(name);
                    coba.push(name);
                    $('input[name='+name+']').parent().addClass('has-error');
                    $('input[name='+name+']').next('.help-block').show().text(value);
                  });
                  $('input[name='+coba[0]+']').focus();
                }
              });
            }
            else 
            {
               //mengupdate data yang telah diedit
              $.ajax({
                type: "POST",
                url: "{{url ('pinjam/edit')}}"+ '/' + $('#id').val(),
                // data: $('#student_form').serialize(),
                data: new FormData(this),
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (data){
                  console.log(data);
                  $('#Modal').modal('hide');
                  swal({
                    title: 'Update Success',
                    text: data.message,
                    type: 'success',
                    timer: '3500'
                  })
                  $('#myTable').DataTable().ajax.reload();
                },
                error: function (data){
                    swal({
                    title: 'Update Error',
                    text: 'Oops...',
                    type: 'error',
                    timer: '3500'
                  })                  
                  $('input').on('keydown keypress keyup click change', function(){
                  $(this).parent().removeClass('has-error');
                  $(this).next('.help-block').hide()
                });
                  var coba = new Array();
                  console.log(data.responseJSON.errors);
                  $.each(data.responseJSON.errors,function(name, value){
                    console.log(name);
                    coba.push(name);
                    $('input[name='+name+']').parent().addClass('has-error');
                    $('input[name='+name+']').next('.help-block').show().text(value);
                  });
                  $('input[name='+coba[0]+']').focus();
                }
             });
            }
         });
          //mengambil data yang ingin diedit
          $(document).on('click', '.edit', function(){
            var bebas = $(this).data('id');
            $('#form_tampil').html('');
            $.ajax({
              url:"{{url('pinjam/getedit')}}" + '/' + bebas,
              method:'get',
              data:{id:bebas},
              dataType:'json',
              success:function(data){
                console.log(data);
                state = "update";
                $('#id').val(data.id);
                $('#no_absen').val(data.no_absen);
                $('#nama').val(data.nama);
                $('#no_induk').val(data.no_induk);
                $('#id_kelas').val(data.id_kelas);
                $('#Modal').modal('show');
                $('#aksi').val('Simpan');
                $('.modal-title').text('Edit Data');
                }
              });
          });
          $(document).on('hide.bs.modal','#Modal', function() {
            $('#myTable').DataTable().ajax.reload();
          });
          
       });
</script>
@endpush