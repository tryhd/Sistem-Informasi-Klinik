<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Obat;
Use Session;
class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=Obat::all();
        return view ('obat.obat-index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data=Obat::all();
        return view ('obat.obat-tambah',compact('data'));
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
            'harga'=>'required|numeric|min:1',
            'stok'=>'required|numeric|min:1'
        ];
        $message=[
            'nama.required'=>'Nama obat tidak boleh kosong!',
            'harga.required'=>'Harga obat tidak boleh kosong!',
            'harga.numeric'=>'Harga obat tidak boleh selain angka!',
            'harga.min'=>'Harga obat tidak boleh kurang dari 1!',
            'stok.required'=>'Stok obat tidak boleh kosong!',
            'stok.numeric'=>'Stok obat tidak boleh selain angka!',
            'stok.min'=>'Stok obat tidak boleh kurang dari 1!',
        ];
        $request->validate($rules,$message);
        $data=new obat;
        $data->nama=$request->nama;
        $data->harga=$request->harga;
        $data->stok=$request->stok;
        $data->save();
        Session::flash('message', 'Data obat '. $data->nama.' berhasil disimpan!');
        Session::flash('type', 'success');
        return redirect()->route('obat.index');
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
        $data=Obat::find($id);
        return view('obat.obat-edit',compact('data'));
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
            'harga'=>'required|numeric|min:1',
            'stok'=>'required|numeric|min:1'
        ];
        $message=[
            'nama.required'=>'Nama obat tidak boleh kosong!',
            'harga.required'=>'Harga obat tidak boleh kosong!',
            'harga.numeric'=>'Harga obat tidak boleh selain angka!',
            'harga.min'=>'Harga obat tidak boleh kurang dari 1!',
            'stok.required'=>'Stok obat tidak boleh kosong!',
            'stok.numeric'=>'Stok obat tidak boleh selain angka!',
            'stok.min'=>'Stok obat tidak boleh kurang dari 1!',
        ];
        $request->validate($rules,$message);
        $data=obat::find($id);
        $data->nama=$request->nama;
        $data->harga=$request->harga;
        $data->stok=$request->stok;
        $data->save();
        Session::flash('message', 'Data obat '. $data->nama.' berhasil diubah!');
        Session::flash('type', 'success');
        return redirect()->route('obat.index');
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
        $data=Obat::find($id);
        $data->delete();
        Session::flash('message', 'Data obat '. $data->nama.' berhasil dihapus!');
        Session::flash('type', 'success');
        return redirect()->route('obat.index');
    }
}
