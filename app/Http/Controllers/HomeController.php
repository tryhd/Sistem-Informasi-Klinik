<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faktur;
use App\obat;
use App\pegawai;
use App\pasien;
use App\tindakan;
use App\wilayah;
use App\resep;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $antri=pasien::query()->where('status','antri')
        ->where('layanan_dokter',Auth()->user()->pegawai_id)->get();
        $periksa=pasien::query()->where('status','obat')
        ->where('layanan_dokter',Auth()->user()->pegawai_id)->get();
        $pendapatan=faktur::all()->sum('tagihan');
        $obat=obat::all()->count();
        $tindakan=tindakan::all()->count();
        $pegawai=pegawai::all()->count();
        $pasien=pasien::all()->count();
        $wilayah=wilayah::all()->count();
        $transaksi=faktur::all()->count();
        $resep=resep::all()->count();
        $resepbelum=resep::query()->where('status','belum')->get();
        return view('dashboard.dashboard',compact('pendapatan','pegawai','pasien','transaksi','antri','periksa','tindakan','wilayah','resep','resepbelum','obat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
