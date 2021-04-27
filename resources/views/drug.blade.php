@extends('adminlte::page')

@section('title', 'Pengelolaan Obat')

@section('content_header')
    <h1>Pengelolaan Obat</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              {{ __('Pengelolaan Obat')}}
              <button class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahDrugModal"><i class="fa fa-plus"></i> Tambah Data</button>
                       {{-- <button class="btn btn-secondary float-right" data-toggle="modal"><a href="{{ route('admin.print.drugs') }}" target="_blank"><i class="fa fa-print"></i> Cetak PDF</a></button> --}}
                </div>
                    <div class="card-body">
                        <table id="table-data" class="table table-borderer display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA OBAT</th>
                                    <th>JENIS</th>
                                    <th>KERJA OBAT</th>
                                    <th>STOK</th>
                                    <th>HARGA</th>
                                    <th>KATEGORI</th>
                                    <th>MEREK</th>
                                    <th>COVER</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach($drugs as $drug)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $drug->namaObat }}</td>
                                    <td>{{ $drug->jenis }}</td>
                                    <td>{{ $drug->brand }}</td>
                                    <td>{{ $drug->stok }}</td>
                                    <td>{{ $drug->harga }}</td>
                                    <td>{{ $drug->categories }}</td>
                                    <td>{{ $drug->brands }}</td>
                                    <td>
                                    @if($drug->cover !== null)
                                        <img src="{{asset('storage/cover_drug/'.$drug->cover) }}" width="100px"/>
                                    @else
                                        [gambar tidak tersedia]
                                    @endif
                                    </td>
                                    <td>
                                      <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" id="btn-edit-drug" class="btn btn-success" data-toggle="modal" data-target="#editDrugModal" data-id="{{ $drug->id }}">Ubah</button>
                                        <button type="button" id="btn-delete-drug" class="btn btn-danger" data-toggle="modal" data-target="#deleteDrugModal" data-id="{{ $drug->id }}" data-cover="{{ $drug->cover }}">Hapus</button>
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

   <div class="modal fade" id="tambahDrugModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Obat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ route('admin.drug.submit') }}" enctype="multipart/form-data">
          @csrf
              <div class="form-group">
                  <label for="namaObat">Nama Obat</label>
                  <input type="text" class="form-control" name="namaObat" id="namaObat" required/>
              </div>
              <div class="form-group">
                  <label for="jenis">Jenis</label>
                  <input type="text" class="form-control" name="jenis" id="jenis" required/>
              </div>
              <div class="form-group">
                <label for="brand">Kerja Obat</label>
                <input type="text" class="form-control" name="brand" id="brand" required/>
            </div>
              <div class="form-group">
                  <label for="stok">Jumlah</label>
                  <input type="text" class="form-control" name="stok" id="stok" required/>
              </div>
              <div class="form-group">
                  <label for="harga">Harga</label>
                  <input type="text" class="form-control" name="harga" id="harga" required/>
              </div>
            <div class="form-group">
              <label for="categories">Kategori</label>
              <input type="text" class="form-control" name="categories" id="categories" required/>
          </div>
          <div class="form-group">
            <label for="brands">Brand</label>
            <input type="text" class="form-control" name="brands" id="brands" required/>
          </div>
              <div class="form-group">
                  <label for="cover">Gambar</label>
                  <input type="file" class="form-control" name="cover" id="cover"/>
              </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Kirim</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editDrugModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data Obat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ route('admin.drug.update') }}" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="edit-namaObat">Nama Obat</label>
                      <input type="text" class="form-control" name="namaObat" id="edit-namaObat" required/>
                  </div>
                  <div class="form-group">
                      <label for="edit-jenis">Jenis</label>
                      <input type="text" class="form-control" name="jenis" id="edit-jenis" required/>
                  </div>
                  <div class="form-group">
                    <label for="edit-brand">Kerja Obat</label>
                    <input type="text" class="form-control" name="brand" id="edit-brand" required/>
                  </div>
                  <div class="form-group">
                      <label for="edit-stok">Jumlah</label>
                      <input type="text" class="form-control" name="stok" id="edit-stok" required/>
                  </div>
                  <div class="form-group">
                      <label for="edit-harga">Harga</label>
                      <input type="number" class="form-control" name="harga" id="edit-harga" required/>
                  </div>
                  <div class="form-group">
                    <label for="categories">Kategori</label>
                    <input type="text" class="form-control" name="categories" id="categories" required/>
                </div>
                <div class="form-group">
                  <label for="brands">Brand</label>
                  <input type="text" class="form-control" name="brands" id="brands" required/>
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group" id="image-area"></div>
                  <div class="form-group">
                      <label for="edit-cover">Gambar</label>
                      <input type="file" class="form-control" name="cover" id="edit-cover"/>
                  </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id" id="edit-id"/>
          <input type="hidden" name="old_cover" id="edit-old-cover"/>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="deleteDrugModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data Obat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        Apakah anda yakin akan menghapus data tersebut?
          <form method="post" action="{{ route('admin.drug.delete') }}" enctype="multipart/form-data">
              @csrf
              @method('DELETE')
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id" id="delete-id" value=""/>
          <input type="hidden" name="old_cover" id="delete-old-cover"/>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
        {{-- <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahDrugModal"><i class="fa fa-plus"></i>Tambah Data</button>
            <a href="{{ route('admin.print.drugs') }}" target="_blank" class="btn btn-danger"></i> Cetak PDF</a>
            <hr/> --}}
          </form>
        </div>
      </div>
    </div>
  </div>

@stop
@section('css')
    <style>
        input[type=text], select, textarea {
        width: 100%; /* Full width */
        padding: 12px; /* Some padding */ 
        border: 1px solid #ccc; /* Gray border */
        border-radius: 4px; /* Rounded borders */
        box-sizing: border-box; /* Make sure that padding and width stays in place */
        margin-top: 6px; /* Add a top margin */
        margin-bottom: 16px; /* Bottom margin */
        resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}
    
    </style>
@stop
{{-- @section('js')
    <script>
        $(function(){


            $(document).on('click', '#btn-edit-drug', function(){
                let id = $(this).data('id');

                $('#image-area').empty();

                $.ajax({
                    type: "get",
                    url: baseurl+'/admin/ajaxadmin/dataDrug/'+id,
                    dataType: 'json',
                    success: function(res){
                        $('#edit-namaObat').val(res.namaObat);
                        $('#edit-jenis').val(res.jenis);
                        $('#edit-brand').val(res.brand);
                        $('#edit-stok').val(res.stok);
                        $('#edit-harga').val(res.harga);
                        // $('#edit-hcategories').val(res.categories);
                        // $('#edit-brands').val(res.brands);
                        $('#edit-id').val(res.id);
                        $('#edit-old-cover').val(res.cover);

                        if (res.cover !== null) {
                            $('#image-area').append(
                                "<img src='"+baseurl+"/storage/cover_drug/"+res.cover+"' width='200px'/>"
                            );
                        } else {
                            $('#image-area').append('[Gambar tidak tersedia]');
                        }
                    },
                });
            });

        });

        $(document).on('click', '#btn-delete-drug', function(){
                let id = $(this).data('id');
                let cover = $(this).data('cover');
                $('#delete-id').val(id);
                $('#delete-old-cover').val(cover);
                console.log("hallo");
            });
    </script>
@stop
@section('js')
    <script>

    </script>
@stop --}}