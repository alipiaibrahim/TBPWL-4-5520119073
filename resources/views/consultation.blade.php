@extends('adminlte::page')

@section('title', 'Konsultasi')

@section('content_header')
    <h1 class="text-center text-bold" style="font-family:Arial, Helvetica, sans-serif">KONSULTASI</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                    <div class="card-body">
                        <form>
                                <div class="form-group">
                                    <label for="inputTanggal">Username</label>
                                        <input type="text" class="form-control" id="inputTanggal" placeholder="Masukkan username">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="text" class="form-control" id="inputEmail" placeholder="Masukkan email">
                                </div>
                                <div class="form-group">
                                    <label for="pesan">Pesan</label>
                                    <textarea class="form-control" aria-label="With textarea" placeholder="Masukan pesan" name="pesan" id="pesan" required></textarea>
                                </div>
                                <br/>
                                <button type="submit" class="btn btn-primary" style="display:block;margin-left: auto;margin-right: auto;"><a href="https://api.whatsapp.com/send?phone=62895803568010" style="color:white"> Kirim</a></button>
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
