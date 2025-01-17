<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class JabatanController extends Controller
{
    //
    public function index()
    {
        return view('jabatan.index', [
            "title" => "Jabatan",
            "data" => Jabatan::all()
        ]);
    }    
    public function create():View
    {
        return view('jabatan.index')->with(["title" => "Tambah Data Jabatan"]);
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
        ]);
        if (empty($request['hp'])) {
            $request['hp']='null';
        if (empty($request['alamat'])) 
            $request['alamat']='null';
        }

        Jabatan::create($request->all());
        return redirect()->route('jabatan.index')->with('success','Data Jabatan Berhasil Ditambahkan');
    }

    public function edit(Jabatan $jabatan):View
    {
        return view('jabatan.editjabatan',compact('jabatan'))->with([
            "title" => "Ubah Data Jabatan",
        ]);
    }
    public function update(Jabatan $jabatan, Request $request):RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
        ]);
        if (empty($request['hp'])) {
            $request['hp']='null';
        if (empty($request['alamat'])) 
            $request['alamat']='null';
        }

        $jabatan->update($request->all());
        return redirect()->route('jabatan.index')->with('updated','Data Jabatan Berhasil Diubah');
    }

}



