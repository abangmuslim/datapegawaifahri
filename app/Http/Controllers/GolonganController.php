<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Golongan;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class GolonganController extends Controller
{
    //
    public function index()
    {
        return view('golongan.index', [
            "title" => "Golongan",
            "data" => Golongan::all()
        ]);
    }    
    public function create():View
    {
        return view('golongan.index')->with(["title" => "Tambah Data Golongan"]);
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

        Golongan::create($request->all());
        return redirect()->route('golongan.index')->with('success','Data Golongan Berhasil Ditambahkan');
    }

    public function edit(Golongan $golongan):View
    {
        return view('golongan.editgolongan',compact('golongan'))->with([
            "title" => "Ubah Data Golongan",
        ]);
    }
    public function update(Golongan $golongan, Request $request):RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
        ]);
        if (empty($request['hp'])) {
            $request['hp']='null';
        if (empty($request['alamat'])) 
            $request['alamat']='null';
        }

        $golongan->update($request->all());
        return redirect()->route('golongan.index')->with('updated','Data Golongan Berhasil Diubah');
    }


}


