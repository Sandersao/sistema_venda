<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $vendas = Venda::paginate(10);
            return response([
                'message' => 'Vendas resgatadas com sucesso',
                'data' => $vendas,
            ])
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Problema ao resgatar as vendas',
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
            $requestData = $request->all();
            $requestData['st_finalizada'] = 0;
            $vendas = Venda::create($requestData);
            return response([
                'message' => 'Venda cadastrada com sucesso',
                'data' => $vendas,
            ])
                ->setStatusCode(201);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Problema ao fazer o cadastro de venda',
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
            $vendas = Venda::find($id);
            return response([
                'message' => 'Venda resgatada com sucesso',
                'data' => $vendas,
            ])
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Problema ao resgatar a venda',
                'data' => [],
            ])
                ->setStatusCode(500);
        }
    }
    /**
     * Display the specified resource based on it's id_colaborador.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showFromColaborador($id)
    {
        try {
            $whereData = [
                ['id_colaborador', '=', $id],
                ['st_finalizada', 0],
            ];
            $vendas = Venda::where($whereData)
                ->orderBy('created_at', 'desc')
                ->limit(1)
                ->get();
            return response([
                'message' => 'Vendas em aberto do calobarador resgatadas com sucesso',
                'data' => $vendas,
            ])
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Problema ao resgatar as vendas em aberto do calobarador',
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
            $vendas = Venda::find($id)
                ->update($request);
            return response([
                'message' => 'Venda atualizada com sucesso',
                'data' => $vendas,
            ])
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Probela ao atualizar a venda',
                'data' => [],
            ])
                ->setStatusCode(500);
        }
    }

    /**
     * Close a previously created resource in storage by seting the field st_finalizada equals to 1.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function close($id)
    {
        try {
            $requestData = ['st_finalizada' => 1];
            Venda::find($id)
                ->update($requestData);
            $vendas = Venda::find($id);
            if ($vendas->st_finalizada == 0) {
                throw new Exception('O registro não foi alterado');
            }
            return response([
                'message' => 'Venda finalizada com sucesso',
                'data' => $vendas,
            ])
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'A venda não pôde ser fechada',
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
            $vendas = Venda::find($id)
                ->delete();
            return response([
                'message' => 'Venda excluída com sucesso',
                'data' => $vendas,
            ])
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Problema ao excluír a venda',
                'data' => [],
            ])
                ->setStatusCode(500);
        }
    }
}
