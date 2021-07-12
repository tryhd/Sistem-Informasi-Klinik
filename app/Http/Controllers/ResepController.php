<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\resep;
Use App\Faktur;
use App\Pasien;
use App\Obat;
use Session;
class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $resep=Resep::query()->where('status','belum')->get();
        $faktur=faktur::all();
        return view('resep.resep-index',compact('faktur','resep'));
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
        $resep=Resep::find($id);
        $pasien=Pasien::find($resep->pasien_id);
        $pasien->status='selesai';
        $pasien->update();
        $obat=Obat::find($resep->obat_id);
        $obat->stok=$obat->stok-1;
        $obat->update();
        $resep->status='selesai';
        $resep->update();
        Session::flash('message','Resep obat '. $resep->pasien->nama .' sudah dibayar!');
        Session::flash('type', 'success');
        return redirect()->route('resep.index');
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
