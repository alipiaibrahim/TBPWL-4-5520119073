<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<body>
    <h1 class="text-center">DATA Obat</h1>
    <p class="text-center">Laporan Data Obat Tahun 2021</p>
<br/>
<table id="table-data" class="table table-bordered">
    <thead>
        <tr>
            <th>NO</th>
            <th>Nama Obat</th>
            <th>Jenis</th>
            <th>Kerja Obat</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Cover</th>
        </tr>
    </thead> 
    <tbody>
        @php $no=1; @endphp
        @foreach($drugs as $drug)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$drug->namaObat}}</td>
                <td>{{$drug->jenis}}</td>
                <td>{{$drug->brand}}</td>
                <td>{{$drug->stok}}</td>
                <td>{{$drug->harga}}</td>
                <td>
                    @if($drug->cover !== null)
                        <img src="{{ public_path('storage/cover_drug/'.$drug->cover) }}" width="80px"/>
                    @else
                        [Gambar tidak tersedia]
                    @endif
                </td>
            </tr>
            @endforeach
    </tbody>
</table>
</body>
</html>