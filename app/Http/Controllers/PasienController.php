<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\Pasien;
use App\Wilayah;
use Session;
class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=Pasien::query()->where('status','selesai')->get();
        $antri=Pasien::query()->where('status','antri')->get();
        return view ('pasien.pasien-index',compact('data','antri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $wilayah=Wilayah::all();
        $pegawai=pegawai::query()
        ->where('jabatan','Dokter')->get();
        return view ('pasien.pasien-tambah',compact('wilayah','pegawai'));
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
        $rules=[
            'nama'=>'required',
            'jenis_kelamin'=>'required',
            'alamat'=>'required',
            'wilayah'=>'required',
            'tgl_lahir'=>'required',
            'telp'=>'required|numeric|min:0',
            'pekerjaan'=>'required',
            'dokter'=>'required',
        ];
        $message=[
            'nama.required'=>'Nama tidak boleh kosong!',
            'jenis_kelamin.required'=>'Jenis kelamin tidak boleh kosong!',
            'alamat.required'=>'Alamat tidak boleh kosong!',
            'wilayah.required'=>'Wilayah tidak boleh kosong!',
            'tgl_lahir.required'=>'Tanggal lahir tidak boleh kosong!',
            'telp.required'=>'Telpon tidak boleh kosong!',
            'telp.numeric'=>'Telpon tidak boleh selain angka!',
            'telp.min'=>'Telpon tidak boleh kurang dari 0!',
            'pekerjaan.required'=>'Pekerjaan tidak boleh kosong!',
            'dokter.required'=>'Layanan dokter tidak boleh kosong!',
        ];
        $request->validate($rules,$message);
        $data=new pasien;
        $data->nama=$request->nama;
        $data->jenis_kelamin=$request->jenis_kelamin;
        $data->alamat=$request->alamat;
        $data->wilayah_id=$request->input('wilayah');
        $data->tgl_lahir=$request->tgl_lahir;
        $data->telp=$request->telp;
        $data->pekerjaan=$request->pekerjaan;
        $data->layanan_dokter=$request->input('dokter');
        $data->status='antri';
        // dd($data);
        $data->save();
        Session::flash('message', 'Data '. $data->nama .' berhasil ditambahkan!');
        Session::flash('type', 'success');
        return redirect()->route('pasien.index');
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
        $data=pasien::find($id);
        $pegawai=pegawai::query()
        ->where('jabatan','Dokter')->get();
        return view ('pasien.pasien-antri',compact('data','pegawai'));
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
            'nama'=>'required',
            // 'jenis_kelamin'=>'required',
            // 'alamat'=>'required',
            // 'wilayah_id'=>'required',
            // 'tgl_lahhir'=>'required',
            // 'telp'=>'required|numeric|min:0',
            // 'pekerjaan'=>'required',
            'dokter'=>'required'
        ];
        $message=[
            'nama.required'=>'Nama tidak boleh kosong!',
            // 'jenis_kelamin.required'=>'Jenis kelamin tidak boleh kosong!',
            // 'alamat.required'=>'Alamat tidak boleh kosong!',
            // 'tgl_lahir.required'=>'Tanggal lahir tidak boleh kosong!',
            // 'telp.required'=>'Telpon tidak boleh kosong!',
            // 'telp.numeric'=>'Telpon tidak boleh selain angka!',
            // 'telp.min'=>'Telpon tidak boleh kurang dari 0!',
            // 'pekerjaan.required'=>'Pekerjaan tidak boleh kosong!',
            'dokter.required'=>'Layanan dokter tidak boleh kosong',
        ];
        $request->validate($rules,$message);
        $data=Pasien::find($id);
        $data->nama=$request->nama;
        $data->layanan_dokter=$request->input('dokter');
        $data->status='antri';
        $data->save();
        Session::flash('message', 'Data '. $data->nama .' berhasil ditambahkan ke antrian!');
        Session::flash('type', 'success');
        return redirect()->route('pasien.index');
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
        $data=Pasien::find($id);
        $data->delete();
        Session::flash('message', 'Data '. $data->nama .' berhasil dihapus!');
        Session::flash('type', 'success');
        return redirect()->route('pasien.index');
    }
}
