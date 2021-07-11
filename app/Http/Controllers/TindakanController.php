<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Tindakan;
Use Session;
class TindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=Tindakan::all();
        return view('tindakan.tindakan-index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data=Tindakan::all();
        return view('tindakan.tindakan-tambah',compact('data'));
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
            'jenis_tindakan'=>'required',
            'tarif'=>'required|numeric|min:1',
        ];
        $message=[
            'jenis_tindakan.reqiured'=>'Tindakan tidak boleh kosong',
            'tarif.reqiured'=>'Tarif tidak boleh kosong',
            'tarif.numeric'=>'Tarif obat tidak boleh selain angka!',
            'tarif.min'=>'Tarif obat tidak boleh kurang dari 1!',
        ];
        $request->validate($rules,$message);
        $data=new Tindakan;
        $data->jenis_tindakan=$request->jenis_tindakan;
        $data->tarif=$request->tarif;
        $data->save();
        Session::flash('message', 'Data '. $data->jenis_tindakan.' berhasil disimpan!');
        Session::flash('type', 'success');
        return redirect()->route('tindakan.index');
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
        $data=Tindakan::find($id);
        return view('tindakan.tindakan-edit',compact('data'));
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
            'jenis_tindakan'=>'required',
            'tarif'=>'required|numeric|min:1',
        ];
        $message=[
            'jenis_tindakan.reqiured'=>'Tindakan tidak boleh kosong',
            'tarif.reqiured'=>'Tarif tidak boleh kosong',
            'tarif.numeric'=>'Tarif obat tidak boleh selain angka!',
            'tarif.min'=>'Tarif obat tidak boleh kurang dari 1!',
        ];
        $request->validate($rules,$message);
        $data=Tindakan::find($id);
        $data->jenis_tindakan=$request->jenis_tindakan;
        $data->tarif=$request->tarif;
        $data->save();
        Session::flash('message', 'Data '. $data->jenis_tindakan.' berhasil diubah!');
        Session::flash('type', 'success');
        return redirect()->route('tindakan.index');
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
        $data=tindakan::find($id);
        $data->delete();
        Session::flash('message', 'Data '. $data->jenis_tindakan.' berhasil dihapus!');
        Session::flash('type', 'success');
        return redirect()->route('tindakan.index');
    }
}
