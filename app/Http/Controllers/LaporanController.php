<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pegawai::count();
        if ($request->filled('q')) {
            $query = $query->where('id', 'LIKE', '%' . $request->q . '%');
        }
        if ($request->filled('tanggal_mulai')) {
            $query = $query->where('created_at', '>=', $request->tanggal_mulai);
        }
        if ($request->filled('tanggal_selesai')) {
            $query = $query->where('created_at', '<=', $request->tanggal_selesai);
        }

    
        $pegawai = Pegawai::All();
        $totalpenjualan = Pegawai::sum('total');
        $title = "Laporan Penjualan";
        
        if ($request->page == 'laporan') {
            return view('laporan.laporan', compact('pegawai', 'totalpenjualan', 'title'));
        }

        return view('laporan.laporan', compact('pegawai', 'totalpenjualan', 'title'));
    }
}



