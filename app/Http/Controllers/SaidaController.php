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
        try {
            $saidas = Saida::paginate(10);
            return response($saidas)
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([])
                ->setStatusCode(500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $saidas = Saida::create($request);
            return response($saidas)
                ->setStatusCode(201);
        } catch (\Throwable $th) {
            return response([])
                ->setStatusCode(500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $saidas = Saida::find($id);
            return response($saidas)
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([])
                ->setStatusCode(500);
        }
    }

    /**
     * Display the specified resource based on it's id_venda.
     *
     * @param  int  $idVenda
     * @return \Illuminate\Http\Response
     */
    public function showFromVenda($id)
    {
        try {
            $saidas = Saida::where('id_venda', $id)
                ->get();
            return response($saidas)
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([])
                ->setStatusCode(500);
        }
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
        try {
            $saidas = Saida::find($id)->update($request);
            return response($saidas)
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([])
                ->setStatusCode(500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $saidas = Saida::find($id)->delete();
            return response($saidas)
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([])
                ->setStatusCode(500);
        }
    }
}
