@extends('adminlte::page')

@section('title', 'Pengaturan Profile')

@section('content_header')
    <h1 class="text-center text-bold" style="font-family:Arial, Helvetica, sans-serif">AKUN PROFILE</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <img src="{{ '../vendor/adminlte/dist/img/foto.png' }}" class="img-fluid" style="border-radius:100%;display:block;margin-left: auto;margin-right: auto; width:170px; height:155px;">
                            </div>
                            <br/>
                            <br/>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputNama">Nama</label>
                                        <input type="nama" class="form-control" id="inputNama" placeholder="Masukkan nama">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword">Username</label>
                                        <input type="password" class="form-control" id="inputPassword" placeholder="Masukkan username">
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputTanggal">Tanggal Lahir</label>
                                        <input type="text" class="form-control" id="inputTanggal" placeholder="Masukkan tanggal lahir">
                                </div>
                                <div class="form-group">
                                    <label for="inputCity">Jenis Kelamin</label>
                                    <input type="text" class="form-control" id="inputCity" placeholder="Masukkan jenis kelamin">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Alamat</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Masukkan alamat">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputState">Provinsi</label>
                                            <select id="inputState" class="form-control">
                                                <option selected>Pilih...</option>
                                                <option>Aceh</option>
                                                <option>Sumatera Utara</option>
                                                <option>Sumatera Barat</option>
                                                <option>Riau</option>
                                                <option>Kepulauan Riau</option>
                                                <option>Jambi</option>
                                                <option>Bengkulu</option>
                                                <option>Sumatera Selatan</option>
                                                <option>Kepulauan Bangka Belitung</option>
                                                <option>Lampung</option>
                                                <option>Bali</option>
                                                <option>Nusa Tenggara Barat</option>
                                                <option>Nusa Tenggara Timur</option>
                                                <option>Kalimantan Utara</option>
                                                <option>Kalimantan Barat</option>
                                                <option>Kalimantan Tengah</option>
                                                <option>Kalimantan Selatan</option>
                                                <option>Kalimantan Timur</option>
                                                <option>Gorontalo</option>
                                                <option>Sulawesi Utara</option>
                                                <option>Sulawesi Barat</option>
                                                <option>Jawa Barat</option>
                                                <option>Jawa Timur</option>
                                                <option>Jawa Tengah</option>
                                                <option>Jakarta</option>
                                                <option>D.I Yogyakarta</option>
                                                <option>Banten</option>
                                                <option>Bali</option>
                                                <option>Sulawesi Tengah</option>
                                                <option>Sulawesi Selatan</option>
                                                <option>Sulawesi Tenggara</option>
                                                <option>Maluku Utara</option>
                                                <option>Maluku</option>
                                                <option>Papua Barat</option>
                                                <option>Papua</option>
                                            </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputState">Kota</label>
                                        <input type="text" class="form-control" id="inputZip" placeholder="Masukkan kota">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputZip">Kecamatan</label>
                                        <input type="text" class="form-control" id="inputZip" placeholder="Masukkan kecamatan">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="inputCity">Handphone</label>
                                        <input type="text" class="form-control" id="inputCity" placeholder="Masukkan no handphone">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputCity">Kode Pos</label>
                                        <input type="text" class="form-control" id="inputCity" placeholder="Kode pos">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputTanggal">Email</label>
                                        <input type="text" class="form-control" id="inputTanggal" placeholder="Tambahkan email">
                                </div>
                                <br/>
                                <button type="submit" class="btn btn-primary" style="display:block;margin-left: auto;margin-right: auto;">Edit</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
<br/>
<br/>
@stop

@section('footer')
<div class="footer" style="text-align: center; color:black;">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.0
    </div>
    <strong>&copy;
    <a href="https://www.instagram.com/ibr.pia/" target="_blank">APOLIA {{date('Y')}}</a>.</strong> All Right reserved.
</div>
@stop

@section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
        <script>console.log ('Hi!')</script>
@stop
