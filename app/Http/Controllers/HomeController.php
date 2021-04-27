<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Categorie;
use PDF;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $user = Auth::user();
        return view('home', compact('user'));
    }

//     public function submit_drug(Request $req)
//     {
//         $drug = new Drug;

//         $drug->namaObat = $req->get('namaObat');
//         $drug->jenis = $req->get('jenis');
//         $drug->brand = $req->get('brand');
//         $drug->stok = $req->get('stok');
//         $drug->harga = $req->get('harga');

//         if ($req->hasFile('cover')) {
//             $extension = $req->file('cover')->extension();

//             $filename = 'cover_drug' . time() . '.' . $extension;
//             $req->file('cover')->storeAs(
//                 'public/cover_drug',
//                 $filename
//             );

//             $drug->cover = $filename;
//         }
//         $drug->save();

//         $notification = array(
//             'message' => 'Data Obat berhasil ditambahkan',
//             'alert-type' => 'success'
//         );

//         return redirect()->route('user.drugs')->with($notification);
//     }

// public function update_drug(Request $req)
//     {
//         $drug = Drug::find($req->get('id'));

//         $drug->namaObat = $req->get('namaObat');
//         $drug->jenis = $req->get('jenis');
//         $drug->brand = $req->get('brand');
//         $drug->stok = $req->get('stok');
//         $drug->harga = $req->get('harga');

//         if ($req->hasFile('cover')) {
//             $extension = $req->file('cover')->extension();

//             $filename = 'cover_drug' . time() . '.' . $extension;
//             $req->file('cover')->storeAs(
//                 'public/cover_drug',
//                 $filename
//             );
//             Storage::delete('public/cover_drug/'.$req->get('old_cover'));

//             $drug->cover = $filename;
//         }
//         $drug->save();

//         $notification = array(
//             'message' => 'Data Obat berhasil diubah',
//             'alert-type' => 'success'
//         );

//         return redirect()->route('user.drugs')->with($notification);
//     }

//     public function delete_drug(Request $req)
//     {
//         $drug = Drug::find($req->get('id'));

//         storage::delete('public/cover_drug/'.$req->get('old_cover'));

//         $drug->delete();

//         $notification = array(
//             'message' => 'Data Obat Berhasil Dihapus',
//             'alert-type' => 'succes'
//         );

//         return redirect()->route('user.drugs')->with($notification);
//     }
//     public function print_drugs()
//     {
//         $drugs = Drug::all();

//         $pdf = PDF::loadview('print_drugs', ['drugs' => $drugs]);
//         return $pdf->download('data_drug.pdf');
//     }
}
