<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\BarangKeluar;
use App\Models\JumlahBarangKeluar;
use App\Models\JumlahBarangMasuk;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $data = BarangKeluar::with('figur', 'jenis_barang', 'jumlah_barang_keluar')->get();
        return response()->json($data)->setStatusCode(200);
    }

    public function show($id)
    {
        $data = BarangKeluar::with('figur', 'jenis_barang', 'jumlah_barang_keluar')->find($id);
        return response()->json($data)->setStatusCode(200);
    }

    public function store(Request $request)
    {
        $barang_keluar = new BarangKeluar();
        $barang_keluar->tanggal = $request->tanggal;
        $barang_keluar->konsumen_id = $request->konsumen_id;
        $barang_keluar->jenis_barang_id = $request->barang_id;
        $barang_keluar->save();

        foreach ($request->jumlah as $jumlah) {
            $jumlah_barang_keluar = new JumlahBarangKeluar();
            $jumlah_barang_keluar->barang_keluar_id = $barang_keluar->id;
            $jumlah_barang_keluar->satuan_id = $jumlah['satuan_id'];
            $jumlah_barang_keluar->jumlah = $jumlah['jumlah'];
            $jumlah_barang_keluar->save();
        }

        return response()->json($request)->setStatusCode(200);
    }

    public function update(Request $request, $id)
    {
        $barang_keluar = BarangKeluar::find($id);
        $barang_keluar->tanggal = $request->tanggal;
        $barang_keluar->konsumen_id = $request->konsumen_id;
        $barang_keluar->jenis_barang_id = $request->barang_id;
        $barang_keluar->save();

        if($request->jumlah_barang_keluar == null) {
            JumlahBarangKeluar::where('barang_keluar_id', $id)->delete();
            return response()->json()->setStatusCode(200);
        }

        (JumlahBarangKeluar::where('barang_keluar_id', $id)->count() > 0) 
            ? JumlahBarangKeluar::where('barang_keluar_id', $id)->delete() : null;

        foreach ($request->jumlah_barang_keluar as $jumlah) {
            $jumlah_barang_keluar = new JumlahBarangKeluar();
            $jumlah_barang_keluar->barang_keluar_id = $barang_keluar->id;
            $jumlah_barang_keluar->satuan_id = $jumlah['satuan_id'];
            $jumlah_barang_keluar->jumlah = $jumlah['jumlah'];
            $jumlah_barang_keluar->save();
        }

        return response()->json($request)->setStatusCode(200);
    }

    public function destroy($id)
    {
        $barang_keluar = BarangKeluar::find($id);
        $barang_keluar->delete();

        return response()->json()->setStatusCode(200);
    }
}
