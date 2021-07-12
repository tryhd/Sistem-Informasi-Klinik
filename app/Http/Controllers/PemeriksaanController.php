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
use App\Faktur;
use Illuminate\Support\Facades\DB;
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
        ->where('layanan_dokter',Auth()->user()->pegawai_id)
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
        $obats=Obat::query()->where('stok' ,'>=' , '1')->get();
        $tindakan=tindakan::all();
        $pasien=Pasien::find($id);
        return view ('pemeriksaan.pemeriksaan-medis',compact('pasien','obats','tindakan'));
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
            'robat'=>'required',
            'ket'=>'required',
        ];
        $message=[
            'diagnosa.required'=>'Diagnosa tidak boleh kosong!',
            'keluhan.required'=>'Keluhan tidak boleh kosong!',
            'tindakan.required'=>'Tindakan tidak boleh kosong!',
            'alergi_obat.required'=>'Alergi obat tidak boleh kosong!',
            'bb.required'=>'Berat badan tidak boleh kosong',
            'tb.required'=>'Tinggi badan tidak boleh kosong!',
            'tensi.required'=>'Tensi darah tidak boleh kosong!',
            'keterangan.required'=>'Keterangan tidak boleh kosong!',
            'robat.required'=>'Obat tidak boleh kosong!',
            'ket.required'=>'Keterangan tidak boleh kosong!'
        ];
        $request->validate($rules,$message);
        $pasien=pasien::find($id);
        $pasien->status='obat';
        $pasien->save();
        $rkm=new Rk_medis;
        $rkm->diagnosa=$request->diagnosa;
        $rkm->keluhan=$request->keluhan;
        $rkm->tindakan_id=$request->input('tindakan');
        $rkm->alergi_obat=$request->alergi_obat;
        $rkm->bb=$request->bb;
        $rkm->tb=$request->tb;
        $rkm->tensi=$request->tensi;
        $rkm->keterangan=$request->keterangan;
        $rkm->pasien_id=$pasien->id;
        $rkm->dokter_id=Auth()->user()->pegawai_id;
        $rkm->save();
        $resep=new Resep;
        $resep->dokter_id=Auth()->user()->pegawai_id;
        $resep->pasien_id=$pasien->id;
        $resep->obat_id=$request->input('robat');
        $resep->keterangan=$request->ket;
        $resep->status='belum';
        $resep->save();
        $hargao=resep::all();
        $faktur=new Faktur;
        $faktur->resep_id=$resep->id;
        $faktur->rkm_id=$rkm->id;
        $harga=DB::select('SELECT o.id,r.id,o.harga,o.stok
        FROM obat o
        JOIN resep r
        WHERE r.obat_id=o.id');
        foreach ($harga as $h){
            $hargaobat=$h->harga;
        }
        $tarif=DB::select('SELECT t.id,rk.tindakan_id,t.tarif
        FROM tindakan t
        JOIN rk_medis rk
        WHERE rk.tindakan_id=t.id');
        foreach ($tarif as $t){
            $tarift=$t->tarif;
        }
        $faktur->tagihan=$tarift + $hargaobat;
        $faktur->save();
        // dd($request->all());
        // dd($rkm,$faktur,$resep,$pasien,$hargaobat,$tarift);
        Session::flash('message',$pasien->nama .' sudah diperiksa!');
        Session::flash('type', 'success');
        return redirect()->route('pemeriksaan.index');
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
