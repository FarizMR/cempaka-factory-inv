<?php

namespace App\Http\Controllers\ViewController;

use App\Http\Controllers\Controller;
use App\Models\ViewModel\ViewBarangKeluar;
use Illuminate\Http\Request;

class ViewBarangKeluarController extends Controller
{
    public function index()
    {
        $data = ViewBarangKeluar::paginate(10);
        return response()->json($data)->setStatusCode(200);
    }
}
