@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>APOTEK ALIPIA</h1>
@stop

@section('content')
    @if($user->roles_id == 1)
        Anda Login Sebagai Admin
    @else
        Anda Login Sebagai User
    @endif
    <div>
        <img src="{{ '../vendor/adminlte/dist/img/kapsul.jpg' }}" class="img-fluid" alt="...">
    </div>
@stop

@section('footer')
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0.0
    </div>
    <strong>CopyRight &copy; {{date('Y')}}
    <a href="http://ft.unsur.ac.id/" target="_blank">Fakultas Teknik,
    Universitas Suryakancana</a>.</strong> All Right reserved
@stop

@section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
        <script>console.log ('Hi!')</script>
@stop
