@extends('adminlte::page')

@section('title', 'Pengelolaan Barang Keluar')

@section('content_header')
    <h1 class="text-center text-bold" style="font-family:Arial, Helvetica, sans-serif">PENGELOLAAN BARANG KELUAR</h1>
@stop
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Pengelolaan Barang Keluar') }}

                </div>
                <div class="card-body">
                    <button class="btn btn-primary float-left mr-3" data-toggle="modal" data-target="#modalTambahData"><i class="fa fa-plus"></i> Tambah Data</button>
                    <a href="{{route('admin.print.keluar')}}" target="_blank" class="btn btn-secondary mb-5"><i class="fa fa-print"></i>Print to PDF</a>

                    <div class="btn-group mb-5" role="group" aria-label="Basis Example">

                    </div>
                    <table id="table-data" class="table table-borderer display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA OBAT</th>
                                <th>TANGGAL</th>
                                <th>JUMLAH</th>
                                <th>AKSI</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach($keluar as $key)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$key->nama}}</td>
                                <td>{{$key->tanggal}}</td>
                                <td>{{$key->jumlah}}</td>
                                <td>
                                    <div class="btn-group" roles="group" aria-label="Basic Example">
                                        <button type="button" id="btn-edit-closes" class="btn" data-toggle="modal" data-target="#modalEdit" data-id="{{ $key->id }}" data-nama="{{ $key->nama }}" data-tanggal="{{ $key->tanggal }}" data-jumlah="{{ $key->jumlah }}"><i class="fa fa-edit"></i></button>
                                        <button type="button" id="btn-delete-closes" class="btn" data-toggle="modal" data-target="#modalDeleteData" data-id="{{ $key->id }}" data-nama="{{$key->nama}}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Data -->

<div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.keluar.submit') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Obat</label>
                        <input type="text" class="form-control" placeholder="Masukan nama obat" name="nama" id="nama" required />
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="text" id ="date" class="date form-control" name="tanggal" id="tanggal" required />
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" placeholder="Masukan jumlah" name="jumlah" id="jumlah" required />
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah Data -->

<!-- Modal Edit Data -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.keluar.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="edit-nama">Nama Obat</label>
                                <input type="text" class="form-control" name="nama" id="edit-nama" required />
                            </div>
                            <div class="form-group">
                                <label for="edit-tanggal">Tanggal</label>
                                <input type="text" class="date form-control" name="tanggal" id="edit-tanggal" required />
                            </div>
                            <div class="form-group">
                                <label for="edit-jumlah">Jumlah</label>
                                <input type="number" min="0" class="form-control" name="jumlah" id="edit-jumlah" required />
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="edit-id" />

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Data -->

<!-- Modal Hapus Data -->
<div class="modal fade" id="modalDeleteData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin akan menghapus data tersebut <strong class="font-bold" id="delete-nama"></strong>?
                <form method="post" action="{{ route('admin.keluar.delete') }}" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="delete-id" value="" />
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
  <div class="footer" style="text-align: center; color: black;">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.0
    </div>
    <strong>&copy;
    <a href="https://www.instagram.com/ibr.pia/" target="_blank">APOLIA {{date('Y')}}</a>.</strong> All Right reserved.
  </div>
@stop

@section('js')
<script>
    $(function() {
        $("#date").datepicker({
            format: 'yyyy-mm-dd', // Notice the Extra space at the beginning
            autoclose: true,
            todayHighlight: true,
            // viewMode: "date",
            // minViewMode: "date"
        });
        $(document).on('click', '#btn-edit-closes', function() {
            let id = $(this).data('id');
            let nama = $(this).data('nama');
            let tanggal = $(this).data('tanggal');
            let jumlah = $(this).data('jumlah');
            $('#edit-nama').val(nama);
            $('#edit-tanggal').val(tanggal);
            $('#edit-jumlah').val(jumlah);
            $('#edit-id').val(id);

            // $.ajax({
            //     type: "get",
            //     url: baseurl + '/admin/ajaxadmin/dataCategories/' + id,
            //     dataType: 'json',
            //     success: function(res) {
            //         console.log(res);
            //     },
            // });
        });

        $(document).on('click', '#btn-delete-closes', function() {
            let id = $(this).data('id');
            let nama = $(this).data('nama');
            $('#delete-id').val(id);
            $('#delete-nama').text(nama);
        });
    });
</script>
@stop