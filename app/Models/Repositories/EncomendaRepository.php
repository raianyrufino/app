<?php

namespace App\Models\Repositories;

use App\Models\Entities\Encomenda;

class EncomendaRepository extends BaseRepository
{
    public function __construct(Encomenda $model)
    {
        $this->model = $model;
    }
}
