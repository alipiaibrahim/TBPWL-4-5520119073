<?php

namespace App\Http\Controllers;

use App\Models\Closes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Category;
use PDF;

class ClosesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $keluar = Closes::all();
        return view('closes', compact('user', 'keluar'));
    }

    public function tambah_closes(Request $req)
    {
        $keluar = new Closes;

        $keluar->nama = $req->get('nama');
        $keluar->tanggal = $req->get('tanggal');
        $keluar->jumlah = $req->get('jumlah');

        $keluar->save();

        $notification = array(
            'message' => 'Data barang keluar berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.keluar')->with($notification);
    }
    //proses ajax
    public function getDataCloses($id)
    {
        $keluar = Closes::find($id);

        return response()->jsonp($keluar);
    }

    public function update_closes(Request $req)
    {

        $keluar = Closes::find($req->get('id'));

        $keluar->nama = $req->get('nama');
        $keluar->tanggal = $req->get('tanggal');
        $keluar->jumlah = $req->get('jumlah');

        $keluar->save();

        $notification = array(
            'message' => 'Data barang keluar berhasil diedit',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.keluar')->with($notification);
    }

    public function delete_closes(Request $req)
    {
        $keluar = Closes::find($req->get('id'));

        $keluar->delete();

        $notification = array(
            'message' => 'Data barang keluar berhasil dihapus',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.keluar')->with($notification);
    }
    // PDF
    public function print_keluar()
    {
        $keluar = Closes::all();

        $pdf = PDF::loadview('print_keluar', ['keluar' => $keluar]);
        return $pdf->download('data_barang_keluar.pdf');
    }
}
