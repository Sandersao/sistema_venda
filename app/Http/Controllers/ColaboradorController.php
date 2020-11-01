<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colaborador;

class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $colaboradores = Colaborador::paginate(10);
            return response([
                'message' => 'Colaboradores resgatados com sucesso',
                'data' => $colaboradores,
            ])
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Problema ao resgatar os colaboradores',
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
            $colaboradores = Colaborador::create($request);
            return response([
                'message' => 'Colaborador cadastrado com sucesso',
                'data' => $colaboradores,
            ])
                ->setStatusCode(201);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Problema a ocadastrar o colaborador',
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
            $colaboradores = Colaborador::find($id);
            return response([
                'message' => 'Colaborador resgatado com sucesso',
                'data' => $colaboradores,
            ])
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Problema ao resgatar o colaborador',
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
            $colaboradores = Colaborador::find($id)
                ->update($request->all());
            return response([
                'message' => 'Colaborador atualizado com sucesso',
                'data' => $colaboradores,
            ])
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Problema ao atualizar o colaborador',
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
            $colaboradores = Colaborador::find($id)
                ->delete();
            return response([
                'message' => 'Colaborador excluído com sucesso',
                'data' => $colaboradores,
            ])
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Problema ao excluir o colaborador',
                'data' => [],
            ])
                ->setStatusCode(500);
        }
    }
}
