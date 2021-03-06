<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $produtos = Produto::paginate(10);
            return response([
                'message' => 'Produtos resgatados com sucesso',
                'data' => $produtos,
            ])
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Problema ao resgatar os produtos',
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
            $produtos = Produto::create($request);
            return response([
                'message' => 'Produto cadastrado com sucesso',
                'data' => $produtos,
            ])
                ->setStatusCode(201);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Problema ao cadastrar o produto',
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
            $produtos = Produto::find($id);
            return response([
                'message' => 'Produto resgatado com sucesso',
                'data' => $produtos,
            ])
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Problema ao resgatar o produto',
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
            $produtos = Produto::find($id)
                ->update($request);
            return response([
                'message' => 'Produto atualizado com sucesso',
                'data' => $produtos,
            ])
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Problema ao atualizar o produto',
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
            $produtos = Produto::find($id)
                ->delete();
            return response([
                'message' => 'Produto excluído com sucesso',
                'data' => $produtos,
            ])
                ->setStatusCode(200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Problema ao excluir produto',
                'data' => [],
            ])
                ->setStatusCode(500);
        }
    }
}
