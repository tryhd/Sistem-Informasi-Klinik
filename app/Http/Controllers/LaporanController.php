<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\faktur;
class LaporanController extends Controller
{
    //
    public function index(){
        $data=Faktur::all();
        return view ('laporan.laporan-index',compact('data'));
    }

    public function laporanpdf(Request $request){
        $mulai=$request->mulai;
        $akhir=$request->akhir;
        $search=faktur::query()
        ->whereBetween('created_at',[$mulai,$akhir])
        ->get();
        // dd($search);
        $pdf = PDF::loadView('laporan.laporan-pdf',compact('search','mulai','akhir'));
        return $pdf->download('Laporan-Transaksi.pdf');
    }
}
