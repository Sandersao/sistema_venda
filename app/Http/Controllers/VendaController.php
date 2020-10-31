<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendas = Venda::paginate(10);
        return $vendas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $requestData['st_finalizada'] = 0;
        $vendas = Venda::create($requestData);
        return $vendas;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendas = Venda::find($id);
        return $vendas;
    }
    /**
     * Display the specified resource based on it's id_colaborador.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showFromColaborador($id)
    {
        $vendas = Venda::where([
            ['id_colaborador', '=', $id],
            ['st_finalizada', 0],
        ])
            ->orderBy('created_at', 'desc')
            ->limit(1);
        return $vendas->get();
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
        $vendas = Venda::find($id)->update($request);
        return $vendas;
    }

    /**
     * Close a previously created resource in storage by seting the field st_finalizada equals to 1.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function close($id)
    {
        $requestData = ['st_finalizada' => 1];
        $vendas = Venda::find($id)->update($requestData);
        return $vendas;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendas = Venda::find($id)->delete();
        return $vendas;
    }
}
