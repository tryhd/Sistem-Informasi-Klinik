<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;;
use App\Pegawai;
use App\Wilayah;
use Session;
use File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=User::all();
        $pegawai=Pegawai::all();
        return view('pegawai.pegawai-index',compact('user','pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user=User::all();
        $pegawai=Pegawai::all();
        $wilayah=Wilayah::all();
        return view('pegawai.pegawai-tambah',compact('user','pegawai','wilayah'));
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
            'tgl_lahir'=>'required',
            'no_tlp'=>'required|numeric|min:0',
            'alamat'=>'required',
            'wilayah'=>'required',
            'jabatan'=>'required',
            'photo'=>'required|image|mimes:png,jpg,jpeg',
            'email'=>'required|unique:users|email',
            'password'=>'required',
        ];
        $message=[
            'nama.required'=>'Nama tidak boleh kosong!',
            'tgl_lahir.required'=>'Tanggal lahir tidak boleh kosong',
            'no_tlp.requored'=>'No Telepon tidak boleh kosong!',
            'no_tlp.numeric'=>'No Telepon tidak boleh selain angka',
            'no_tlp.min'=>'No Telepon tidak boleh kurang dari 0!',
            'alamat.required'=>'Alamat tidak boleh kosong!',
            'wilayah.required'=>'Wilayah tidak boleh kosong',
            'jabatan.required'=>'Jabatan tidak boleh kosong',
            'photo.required'=>'Foto tidak boleh kosong!',
            'photo.image'=>'Foto tidak boleh selain file gambar!',
            'photo.mimes'=>'Foto tidak boleh selain file *jpg *png *jpeg',
            'email.required'=>'Email tidak boleh kosong!',
            'email.unique'=>'Email sudah digunakan!',
            'eamil.email'=>'Format email tidak sesuai!',
            'password.required'=>'Password tidak boleh kosong!'
        ];
        $foto_nama=null;
        if ($request->hasFile('photo')){
            $foto_nama=$this->uploadFoto($request,$foto_nama);
        }
        $request->validate($rules,$message);
        $pegawai=new Pegawai;
        $pegawai->nama=$request->nama;
        $pegawai->tgl_lahir=$request->tgl_lahir;
        $pegawai->no_tlp=$request->no_tlp;
        $pegawai->alamat=$request->alamat;
        $pegawai->wilayah_id=$request->input('wilayah');
        $pegawai->jabatan=$request->jabatan;
        $pegawai->photo=$foto_nama;

        $pegawai->save();
        $user=new user;
        $user->name=$pegawai->nama;
        $user->email=$request->email;
        $user->pegawai_id=$pegawai->id;
        $user->password=Hash::make($request->password);
        $user->role=$pegawai->jabatan;

        // dd($pegawai,$user);
        $user->save();
        Session::flash('message', 'Data '. $pegawai->nama .' berhasil ditambahkan!');
        Session::flash('type', 'success');
        return redirect()->route('pegawai.index');
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
        $user=User::all();
        $pegawai=Pegawai::find($id);
        $wilayah=Wilayah::all();
        return view('pegawai.pegawai-edit',compact('user','pegawai','wilayah'));
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
            'tgl_lahir'=>'required',
            'no_tlp'=>'required|numeric|min:0',
            'alamat'=>'required',
            'wilayah'=>'required',
            'jabatan'=>'required',
            'photo'=>'image|mimes:png,jpg,jpeg',
        ];
        $message=[
            'nama.required'=>'Nama tidak boleh kosong!',
            'tgl_lahir.required'=>'Tanggal lahir tidak boleh kosong',
            'no_tlp.requored'=>'No Telepon tidak boleh kosong!',
            'no_tlp.numeric'=>'No Telepon tidak boleh selain angka',
            'no_tlp.min'=>'No Telepon tidak boleh kurang dari 0!',
            'alamat.required'=>'Alamat tidak boleh kosong!',
            'wilayah.required'=>'Wilayah tidak boleh kosong',
            'jabatan.required'=>'Jabatan tidak boleh kosong',
            'photo.image'=>'Foto tidak boleh selain file gambar!',
            'photo.mimes'=>'Foto tidak boleh selain file *jpg *png *jpeg',
        ];
        $foto_nama=null;
        if ($request->hasFile('photo')){
            $foto_nama=$this->uploadFoto($request,$foto_nama);
        }
        $request->validate($rules,$message);
        $pegawai=pegawai::find($id);
        $pegawai->nama=$request->nama;
        $pegawai->tgl_lahir=$request->tgl_lahir;
        $pegawai->no_tlp=$request->no_tlp;
        $pegawai->alamat=$request->alamat;
        $pegawai->wilayah_id=$request->input('wilayah');
        $pegawai->jabatan=$request->jabatan;
        if ($foto_nama==null) {
            $foto_nama=$pegawai->photo;
        } else {
            $pegawai->photo=$foto_nama;
        }
        // dd($pegawai);
        $pegawai->save();
        Session::flash('message', 'Data '. $pegawai->nama .' berhasil diubah!');
        Session::flash('type', 'success');
        return redirect()->route('pegawai.index');
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
        $data=pegawai::find($id);
        $data->delete();
        Session::flash('message', 'Data '. $data->nama .' berhasil dihapus!');
        Session::flash('type', 'success');
        return redirect()->route('pegawai.index');
    }
    private function uploadFoto(Request $request, $foto_user_old)
    {
        $foto_user = $request->file('photo');
        $ext = $foto_user->getClientOriginalExtension();
        if ($request->file('photo')->isValid()) {
            $foto_nama   = date('Ymdhis') . "." . $ext;
            $image_resize = Image::make($foto_user->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save('img/pegawai/' . $foto_nama);
            if ($foto_user_old != null) {
                $path_old = 'img/pegawai/' . $foto_user_old;
                @unlink($path_old);
            }
            return $foto_nama;
        }
        return $foto_user_old;
    }
}
