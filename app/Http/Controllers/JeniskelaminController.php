<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jeniskelamin;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class JeniskelaminController extends Controller
{
    //
    public function index()
    {
        return view('jeniskelamin.index', [
            "title" => "Jeniskelamin",
            "data" => Jeniskelamin::all()
        ]);
    }    
    public function create():View
    {
        return view('jeniskelamin.index')->with(["title" => "Tambah Data Jeniskelamin"]);
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

        Jeniskelamin::create($request->all());
        return redirect()->route('jeniskelamin.index')->with('success','Data Jeniskelamin Berhasil Ditambahkan');
    }

    public function edit(Jeniskelamin $jeniskelamin):View
    {
        return view('jeniskelamin.editjeniskelamin',compact('jeniskelamin'))->with([
            "title" => "Ubah Data Jeniskelamin",
        ]);
    }
    public function update(Jeniskelamin $jeniskelamin, Request $request):RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
        ]);
        if (empty($request['hp'])) {
            $request['hp']='null';
        if (empty($request['alamat'])) 
            $request['alamat']='null';
        }

        $jeniskelamin->update($request->all());
        return redirect()->route('jeniskelamin.index')->with('updated','Data Jeniskelamin Berhasil Diubah');
    }

}



