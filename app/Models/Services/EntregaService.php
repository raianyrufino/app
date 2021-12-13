<?php

namespace App\Models\Services;

use App\Models\Repositories\{EntregaRepository, EncomendaRepository};
use App\Exceptions\BusinessException;

class EntregaService
{
    public function __construct(EntregaRepository $repository, EncomendaRepository $encomendaRepository)
    {
        $this->repository = $repository;
        $this->encomendaRepository = $encomendaRepository;
    }

    public function cadastrar($request)
    {
        $entrega = $this->repository->findBy('id', $request['id']);
        
        if ($entrega) {
            throw new BusinessException("ID da Entrega solicitada já existente", 406);
        }

        $encomendas = $request['encomendas'];

        unset($request['encomendas']);
        
        $entrega = $this->repository->create($request);

        foreach ($encomendas as $encomenda) {
            $encomenda['entrega_id'] = $entrega->id;
            $this->encomendaRepository->create($encomenda);
        }
    }   

    public function obterProxima()
    {
        try {
            $entrega = $this->repository->obterProxima();
            
            return $entrega ?? [];
        } catch (\Exception $e) {
            throw new BusinessException('Base de dados não encontrada.', 500);
        }
    }

    public function atualizarStatus($id, $status)
    {
        $entrega = $this->repository->findBy('id', $id);
        
        if (!$entrega) {
            throw new BusinessException("Entrega não encontrada.", 404);
        }

        $this->repository->atualizarStatus($id, $status);
    }

    public function remover($id)
    {
        $entrega = $this->repository->findBy('id', $id);
        
        if (!$entrega) {
            throw new BusinessException("Entrega não encontrada.", 404);
        }

        $this->repository->delete($id);
    }
}
