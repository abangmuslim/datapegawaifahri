<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agama;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AgamaController extends Controller
{
    //
    public function index()
    {
        return view('agama.index', [
            "title" => "Agama",
            "data" => Agama::all()
        ]);
    }    
    public function create():View
    {
        return view('agama.index')->with(["title" => "Tambah Data Agama"]);
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

        Agama::create($request->all());
        return redirect()->route('agama.index')->with('success','Data Agama Berhasil Ditambahkan');
    }

    public function edit(Agama $agama):View
    {
        return view('agama.editagama',compact('agama'))->with([
            "title" => "Ubah Data Agama",
        ]);
    }
    public function update(Agama $agama, Request $request):RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
        ]);
        if (empty($request['hp'])) {
            $request['hp']='null';
        if (empty($request['alamat'])) 
            $request['alamat']='null';
        }

        $agama->update($request->all());
        return redirect()->route('agama.index')->with('updated','Data Agama Berhasil Diubah');
    }

}



