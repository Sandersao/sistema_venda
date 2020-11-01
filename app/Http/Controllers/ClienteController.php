<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $clientes = Cliente::paginate(10);
            return response($clientes)
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
            $clientes = Cliente::create($request);
            return response($clientes)
                ->setStatusCode(201);
        } catch (\Throwable $th) {
            return response()
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
            $clientes = Cliente::find($id);
            return response($clientes)
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
            $clientes = Cliente::find($id)
                ->update($request->all());
            return response($clientes)
                ->setStatusCode(201);
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
            $clientes = Cliente::find($id)
                ->delete();
            return response($clientes)
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([])
                ->setStatusCode(500);
        }
    }
}
