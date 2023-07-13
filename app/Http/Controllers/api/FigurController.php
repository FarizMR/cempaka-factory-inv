<?php

namespace App\Http\Controllers\api;

use App\Models\Figur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FigurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Figur::paginate(10);
        return response()->json($data)->setStatusCode(200);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Figur();
        $data->nama = $request->nama;
        $data->isPemasok = ($request->isPemasok == null) ? false : $request->isPemasok;
        $data->isKonsumen = ($request->isKonsumen == null) ? false : $request->isKonsumen;
        $data->save();

        return response()->json($data)->setStatusCode(200);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Figur::find($id);
        return response()->json($data)->setStatusCode(200);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Figur::find($id);
        $data->nama = $request->nama;
        $data->isPemasok = $request->isPemasok;
        $data->isKonsumen = $request->isKonsumen;
        $data->save();

        return response()->json($data)->setStatusCode(200);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Figur::find($id);
        $data->delete();

        return response()->json($data)->setStatusCode(200);;
    }

    // Tambahan

    public function getPemasok()
    {
        $data = Figur::where('isPemasok', true)->get();
        return response()->json($data)->setStatusCode(200);;
    }

    public function getKonsumen()
    {
        $data = Figur::where('isKonsumen', true)->get();
        return response()->json($data)->setStatusCode(200);;
    }
}
