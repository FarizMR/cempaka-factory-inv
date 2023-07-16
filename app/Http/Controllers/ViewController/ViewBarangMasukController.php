<?php

namespace App\Http\Controllers\ViewController;

use App\Http\Controllers\Controller;
use App\Models\ViewModel\ViewBarangMasuk;
use Illuminate\Http\Request;

class ViewBarangMasukController extends Controller
{
    public function index()
    {
        $data = ViewBarangMasuk::paginate(10);
        // dd($data);
        return response()->json($data)->setStatusCode(200);
    }
}
