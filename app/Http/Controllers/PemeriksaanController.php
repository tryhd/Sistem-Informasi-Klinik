<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\Pegawai;
use App\User;
use Session;
use App\Resep;
use App\Obat;
use App\Rk_medis;
use App\tindakan;
class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $periksa=Pasien::query()->where('status','obat')->get();
        $pasien=Pasien::query()->where('status','antri')
        // ->where('layanan_dokter',Auth()->user()->id)
        ->get();
        return view ('pemeriksaan.pemeriksaan-index',compact('pasien','periksa'));
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
        $obat=Obat::query()->where('stok' ,'>=','1')->get();
        $tindakan=tindakan::all();
        $pasien=Pasien::find($id);
        return view ('pemeriksaan.pemeriksaan-medis',compact('pasien','obat','tindakan'));
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
        $rules=[
            'diagnosa'=>'required',
            'keluhan'=>'required',
            'tindakan'=>'required',
            'alergi_obat'=>'required',
            'bb'=>'required',
            'tb'=>'required',
            'tensi'=>'required',
            'keterangan'=>'required',
            'obat'=>'required',
        ];
        $message=[
            'diagnosa.required'=>'Diagnosa tidak boleh kosong!',
            'keluhan.required'=>'Keluhan tidak boleh kosong!',
            'tindakan.required'=>'Tindakan tidak boleh kosong!',
            'alergi_obat.required'=>'Alegi obat tidak boleh kosong!',
            'bb.required'=>'Berat badan tidak boleh kosong',
            'tb.required'=>'Tinggi badan tidak boleh kosong!',
            'tensi.required'=>'Tensi darah tidak boleh kosong!',
            'keterangan.required'=>'Keterangan tidak boleh kosong!',
            'obat.required'=>'Obat tidak boleh kosong!',
        ];
        $request->validate($rules,$message);
        $pasien=pasien::find($id);
        $pasien->status='obat';
        $pasien->save();
        $rkm=new Rk_medis;
        $rkm->diagnosa=$request->diagnosa;
        $rkm->keluhan=$request->keluhan;
        $rkm->tindakan_id=$request->input('tindakan');
        $rkm->alergi_obat=$request->alergi;
        $rkm->bb=$request->bb;
        $rkm->tb=$request->tb;
        $rkm->tensi=$request->tensi;
        $rkm->keterangan=$request->keterangan;
        $rkm->pasien_id=$pasien->id;
        $rkm->dokter_id=Auth()->user()->id;
        $rkm->save();
        $resep=new Resep;
        $resep->dokter_id=Auth()->user()->id;
        $resep->pasien_id=$pasien->id;
        $resep->obat_id=$request->input('obat');
        $resep->keterangan=$request->keterangan;
        $resep->status='belum';
        $resep->save();
        Session::flash('message',$pasien->nama .' sudah diperiksa!');
        Session::flash('type', 'success');
        return redirect()->route('pemeriksaan.pemeriksaan-index');
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
