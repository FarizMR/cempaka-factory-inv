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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
