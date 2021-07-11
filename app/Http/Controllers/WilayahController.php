<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wilayah;
use Session;
class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=Wilayah::all();
        return view ('wilayah.wilayah-index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data=Wilayah::all();
        return view ('wilayah.wilayah-tambah',compact('data'));
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
            'kota'=>'required',
            'kecamatan'=>'required'
        ];
        $message=[
            'kota.required'=>'Kota tidak boleh kosong!',
            'kecamatan.required'=>'Kecamatan tidak boleh kosong!'
        ];
        $request->validate($rules,$message);
        $data=new wilayah;
        $data->kota=$request->kota;
        $data->kecamatan=$request->kecamatan;
        $data->save();
        Session::flash('message', 'Data wilayah berhasil disimpan!');
        Session::flash('type', 'success');
        return redirect()->route('wilayah.index');
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
        $data=Wilayah::find($id);
        return view ('wilayah.wilayah-edit',compact('data'));
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
            'kota'=>'required',
            'kecamatan'=>'required'
        ];
        $message=[
            'kota.required'=>'Kota tidak boleh kosong!',
            'kecamatan.required'=>'Kecamatan tidak boleh kosong!'
        ];
        $request->validate($rules,$message);
        $data=wilayah::find($id);
        $data->kota=$request->kota;
        $data->kecamatan=$request->kecamatan;
        $data->save();
        Session::flash('message', 'Data wilayah berhasil diubah!');
        Session::flash('type', 'success');
        return redirect()->route('wilayah.index');
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
        $data=wilayah::find($id);
        $data->delete();
        Session::flash('message', 'Data wilayah berhasil dihapus!');
        Session::flash('type', 'success');
        return redirect()->route('wilayah.index');
    }
}
