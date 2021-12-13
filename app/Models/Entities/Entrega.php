<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    protected $fillable = [
        'id',
        'rota', 
        'entregue', 
        'placa-veiculo', 
        'data-limite', 
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function encomendas()
    {
        return $this->hasMany(Encomenda::class, 'entrega_id', 'id');
    }
}
