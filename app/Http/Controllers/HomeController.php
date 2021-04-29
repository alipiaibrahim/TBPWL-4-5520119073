<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Categorie;
use PDF;
use Carbon\Carbon;
use Order;
use DB;

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

    public function getChart()
    {
        //MENGAMBIL TANGGAL 7 HARI YANG TELAH LALU DARI TANGGAL HARI INI
        $start = Carbon::now()->subWeek()->addDay()->format('Y-m-d') . ' 00:00:01';
        //MENGAMBIL TANGGAL HARI INI
        $end = Carbon::now()->format('Y-m-d') . ' 23:59:00';
        
        //SELECT DATA KAPAN RECORDS DIBUAT DAN JUGA TOTAL PESANAN
        $order = Order::select(DB::raw('date(created_at) as order_date'), DB::raw('count(*) as total_order'))
            //DENGAN KONDISI ANTARA TANGGAL YANG ADA DI VARIABLE $start DAN $end 
            ->whereBetween('created_at', [$start, $end])
            //KEMUDIAN DI KELOMPOKKAN BERDASARKAN TANGGAL
            ->groupBy('created_at')
            ->get()->pluck('total_order', 'order_date')->all();
        
        //LOOPING TANGGAL DENGAN INTERVAL SEMINGGU TERAKHIR
        for ($i = Carbon::now()->subWeek()->addDay(); $i <= Carbon::now(); $i->addDay()) {
            //JIKA DATA NYA ADA 
            if (array_key_exists($i->format('Y-m-d'), $order)) {
                //MAKA TOTAL PESANANNYA DI PUSH DENGAN KEY TANGGAL
                $data[$i->format('Y-m-d')] = $order[$i->format('Y-m-d')];
            } else {
                //JIKA TIDAK, MASUKKAN NILAI 0
                $data[$i->format('Y-m-d')] = 0;
            }
        }
        return response()->json($data);
    }
}
