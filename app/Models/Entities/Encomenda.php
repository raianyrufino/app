<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Encomenda extends Model
{
    protected $fillable = [
        'produto', 
        'endereco', 
        'entrega_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'entrega_id'
    ];

    public function entrega()
    {
        return $this->belongsTo(Entrega::class, 'entrega_id', 'id');
    }
}
