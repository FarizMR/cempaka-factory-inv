<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\BarangMasuk;
use App\Models\Figur;
use App\Models\JumlahBarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $data = BarangMasuk::with('figur', 'jenis_barang', 'jumlah_barang_masuk')->get();
        return response()->json($data)->setStatusCode(200);
    }

    public function show($id)
    {
        $data = BarangMasuk::with('figur', 'jenis_barang', 'jumlah_barang_masuk')->find($id);
        return response()->json($data)->setStatusCode(200);
    }

    public function store(Request $request)
    {
        $barang_masuk = new BarangMasuk();
        $barang_masuk->tanggal = $request->tanggal;
        $barang_masuk->pemasok_id = $request->pemasok_id;
        $barang_masuk->jenis_barang_id = $request->barang_id;
        $barang_masuk->save();

        foreach ($request->jumlah as $jumlah) {
            $jumlah_barang_masuk = new JumlahBarangMasuk();
            $jumlah_barang_masuk->barang_masuk_id = $barang_masuk->id;
            $jumlah_barang_masuk->satuan_id = $jumlah['satuan_id'];
            $jumlah_barang_masuk->jumlah = $jumlah['jumlah'];
            $jumlah_barang_masuk->save();
        }

        return response()->json($request)->setStatusCode(200);
    }

    public function update(Request $request, $id)
    {
        $barang_masuk = BarangMasuk::find($id);
        $barang_masuk->tanggal = $request->tanggal;
        $barang_masuk->pemasok_id = $request->pemasok_id;
        $barang_masuk->jenis_barang_id = $request->barang_id;
        $barang_masuk->save();

        if($request->jumlah_barang_masuk == null) {
            JumlahBarangMasuk::where('barang_masuk_id', $id)->delete();
            return response()->json()->setStatusCode(200);
        }

        JumlahBarangMasuk::where('barang_masuk_id', $id)->delete();

        foreach ($request->jumlah_barang_masuk as $jumlah) {
            $jumlah_barang_masuk = new JumlahBarangMasuk();
            $jumlah_barang_masuk->barang_masuk_id = $barang_masuk->id;
            $jumlah_barang_masuk->satuan_id = $jumlah['satuan_id'];
            $jumlah_barang_masuk->jumlah = $jumlah['jumlah'];
            $jumlah_barang_masuk->save();
        }

        return response()->json()->setStatusCode(200);
    }

    public function destroy($id)
    {
        $barang_masuk = BarangMasuk::find($id);
        $barang_masuk->delete();

        return response()->json()->setStatusCode(200);
    }
}
