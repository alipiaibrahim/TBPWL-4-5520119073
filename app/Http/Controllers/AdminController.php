<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Categories;
use App\Models\Brands;
use App\Models\Drug;
use PDF;

class AdminController extends Controller
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

}
// public function update_drug(Request $req)
//     {
//         $drug = Drug::find($req->get('id'));

//         $drug->namaObat = $req->get('namaObat');
//         $drug->jenis = $req->get('jenis');
//         $drug->brand = $req->get('brand');
//         $drug->stok = $req->get('stok');
//         $drug->harga = $req->get('harga');
//         $drug->harga = $req->get('categories');
//         $drug->harga = $req->get('brands');

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

//         return redirect()->route('admin.drugs')->with($notification);
//     }
//     public function print_drugs()
//     {
//         $drugs = Drug::all();

//         $pdf = PDF::loadview('print_drugs', ['drugs' => $drugs]);
//         return $pdf->download('data_drug.pdf');
//     }


    // PENGELOLAAN CATEGORIES

