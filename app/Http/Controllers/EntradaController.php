<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $entradas = Entrada::paginate(10);
            return response([
                'message' => 'Entradas resgatadas com sucesso',
                'data' => $entradas,
            ])
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Problema ao resgatar as entradas',
                'data' => [],
            ])
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
            $entradas = Entrada::create($request);
            return response([
                'message' => 'Entrada cadastrada com sucesso',
                'data' => $entradas,
            ])
                ->setStatusCode(201);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Problema ao cadastrar a entrada',
                'data' => [],
            ])
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
            $entradas = Entrada::find($id);
            return response([
                'message' => 'Entrada resgatada com sucesso',
                'data' => $entradas,
            ])
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Problema ao resgatar a entrada',
                'data' => [],
            ])
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
            $entradas = Entrada::find($id)
                ->update($request);
            return response([
                'message' => 'Entrada atualizada com sucesso',
                'data' => $entradas,
            ])
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Problema ao atualizar a entrada',
                'data' => [],
            ])
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
            $entradas = Entrada::find($id)
                ->delete();
            return response([
                'message' => 'Entrada excluída com sucesso',
                'data' => $entradas,
            ])
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Problema ao excluir a entrada',
                'data' => [],
            ])
                ->setStatusCode(500);
        }
    }
}
