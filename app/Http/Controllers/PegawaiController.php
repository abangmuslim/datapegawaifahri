<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\User;
use App\Models\jabatan;
use App\Models\golongan;
use App\Models\agama;
use App\Models\jeniskelamin;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class PegawaiController extends Controller
{
    //
    public function index()
    {
        $pegawai=Pegawai::all();
        return view('pegawai.index',[
            "title"=>"Pegawai",
            "data"=>$pegawai
        ]);
    }
    public function create():View
    {
        return view('pegawai.create')->with([
            "title" => "Tambah Data Pegawai",
            "user"=> user::all(),
            "jabatan"=> jabatan::all(),
            "golongan"=> golongan::all(),
            "agama"=> agama::all(),
            "jeniskelamin"=> jeniskelamin::all()
    ]);
    }
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            "user_id"=>"required",
            "nama"=>"required",
            "nip"=>"required",
            "nik"=>"required",
            "tmt"=>"required",
            "usia"=>"required",
            "masakerja"=>"required",
            "golongan_id"=>"required",
            "jabatan_id"=>"required",
            "agama_id"=>"required",
            "jeniskelamin_id"=>"required",
            "ttl"=>"required",
            "gaji"=>"required",
        ]);
        
        Pegawai::create($request->all());
        return redirect()->route('pegawai.index')->with('success','Data Pegawai Berhasil Ditambahkan');
    }
    public function edit(Pegawai $pegawai):View
    {
        return view('pegawai.edit',compact('pegawai'))->with([
            "title" => "Ubah Data Pegawai",
            "user"=> user::all(),
            "jabatan"=> jabatan::all(),
            "golongan"=> golongan::all(),
            "agama"=> agama::all(),
            "jeniskelamin"=> jeniskelamin::all()
        ]);
    }
    public function update(Pegawai $pegawai, Request $request):RedirectResponse
    {
        $request->validate([
            "user_id"=>"required",
            "nama"=>"required",
            "nip"=>"required",
            "nik"=>"required",
            "tmt"=>"required",
            "usia"=>"required",
            "masakerja"=>"required",
            "golongan_id"=>"required",
            "jabatan_id"=>"required",
            "agama_id"=>"required",
            "jeniskelamin_id"=>"required",
            "ttl"=>"required",
            "gaji"=>"required",
        ]);

        $pegawai->update($request->all());
        return redirect()->route('pegawai.index')->with('updated','Data Pegawai Berhasil Diubah');
    }
    public function show():View
    {
        $pegawai=Pegawai::all();
        return view('pegawai.show')->with([
            "title" => "Tampil Data Pegawai",
            "data"=>$pegawai
        ]);
    }
    public function destroy($id):RedirectResponse
    {
        
        Pegawai::where('id',$id)->delete();
        return redirect()->route('pegawai.index')->with('deleted','Data Pegawai Berhasil Dihapus');
    }

}


