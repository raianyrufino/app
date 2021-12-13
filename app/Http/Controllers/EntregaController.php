<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Models\Services\EntregaService;
use App\Http\Requests\Entrega\{CadastrarRequest, AtualizarStatusRequest};

class EntregaController extends Controller
{
    public function __construct(EntregaService $service)
    {
        $this->service = $service;
    }

    public function cadastrar(CadastrarRequest $request)
    {
        $this->service->cadastrar($request->all());
     
        return response()->json()->status(200);
    }   

    public function obterProxima()
    {
        $response = $this->service->obterProxima();

        return response()->json($response, 200); 
    }

    public function atualizarStatus($id, AtualizarStatusRequest $request)
    {
        $this->service->atualizarStatus($id, $request->status);

        return response()->json()->status(200);
    }

    public function remover($id)
    {
        $this->service->remover($id);

        return response()->json()->status(200);
    }
}
