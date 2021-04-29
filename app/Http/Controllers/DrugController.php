<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class DrugController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $drugs = Drug::all();
        return view('drug', compact('user', 'drugs'));
    }

    public function create()
    {
        //
    }

    public function store(Request $req)
    {
        $drug = new Drug;

        $drug->nama = $req->get('nama');
        $drug->jenis = $req->get('jenis');
        $drug->categories = $req->get('categories');
        $drug->brands = $req->get('brands');
        $drug->stok = $req->get('stok');
        $drug->harga = $req->get('harga');
        

        if ($req->hasFile('cover')) {
            $extension = $req->file('cover')->extension();

            $filename = 'cover_drug_'.time().'.'.$extension;

            $req->file('cover')->storeAs(
                'public/cover_drug', $filename
            );

            $drug->cover = $filename;
        }

        $drug->save();

        $notification = array(
            'message' => 'Data Obat berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.drugs')->with($notification);

    }

    public function submit_drug(Request $req)
    {
        $drug = new Drug;

        $drug->nama = $req->get('nama');
        $drug->jenis = $req->get('jenis');
        $drug->categories = $req->get('categories');
        $drug->brands = $req->get('brands');
        $drug->stok = $req->get('stok');
        $drug->harga = $req->get('harga');

        if ($req->hasFile('cover')) {
            $extension = $req->file('cover')->extension();

            $filename = 'cover_drug' . time() . '.' . $extension;
            $req->file('cover')->storeAs(
                'public/cover_drug',
                $filename
            );

            $drug->cover = $filename;
        }
        $drug->save();

        $notification = array(
            'message' => 'Data Obat berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.drugs')->with($notification);
    }
  
    public function show(Drug $drug)
    {
        //
    }

    public function edit(Drug $drug)
    {
        //
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drug  $book
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $req)
    {
        $drug = Drug::find($req->get('id'));

        $drug->nama = $req->get('nama');
        $drug->jenis = $req->get('jenis');
        $drug->categories = $req->get('categories');
        $drug->brands = $req->get('brands');
        $drug->stok = $req->get('stok');
        $drug->harga = $req->get('harga');


        if ($req->hasFile('cover')) {
            $extension = $req->file('cover')->extension();

            $filename = 'cover_drug_'.time().'.'.$extension;

            $req->file('cover')->storeAs(
                'public/cover_drug', $filename
            );

            Storage::delete('public/cover_drug/'.$req->get('old_cover'));

            $drug->cover = $filename;
        }

        $drug->save();

        $notification = array(
            'message' => 'Data Obat berhasil diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.drugs')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drug  $book
     * @return \Illuminate\Http\Response
     */
    public function getDataDrug($id)
    {
        $drug = Drug::find($id);

        return response()->json($drug);
    }
    public function destroy(Request $req)
    {
        $drug = Drug::find($req->id);
        Storage::delete('public/cover_drug/'.$req->get('old_cover'));
        $drug->delete();
     
        $notification = array(
            'message' => 'Data Obat berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.drugs')->with($notification);

    }

    public function delete_drug(Request $req)
    {
        $drug = Drug::find($req->get('id'));

        storage::delete('public/cover_drug/'.$req->get('old_cover'));

        $drug->delete();

        $notification = array(
            'message' => 'Data Obat Berhasil Dihapus',
            'alert-type' => 'succes'
        );

        return redirect()->route('admin.drugs')->with($notification);
    }
}
