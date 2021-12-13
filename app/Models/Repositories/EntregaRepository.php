<?php

namespace App\Models\Repositories;

use App\Models\Entities\Entrega;

class EntregaRepository extends BaseRepository
{
    public function __construct(Entrega $model)
    {
        $this->model = $model;
    }

    public function obterProxima()
    {
        return $this->model
                    ->where('entregue', false)
                    ->with('encomendas')
                    ->orderBy('data-limite', 'DESC')
                    ->first();
    }

    public function atualizarStatus($id, $status)
    {        
        $this->model->whereId($id)->update(['entregue' => $status]);
    }
}
