<?php

namespace App\Http\Controllers;

use App\Models\Saida;
use Illuminate\Http\Request;

class SaidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saidas = Saida::paginate(10);
        return $saidas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $saidas = Saida::create($request);
        return $saidas;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $saidas = Saida::find($id);
        return $saidas;
    }

    /**
     * Display the specified resource based on it's id_venda.
     *
     * @param  int  $idVenda
     * @return \Illuminate\Http\Response
     */
    public function showFromVenda($id)
    {
        $saidas = Saida::where('id_venda', $id);
        return $saidas->get();
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
        $saidas = Saida::find($id)->update($request);
        return $saidas;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $saidas = Saida::find($id)->delete();
        return $saidas;
    }
}
