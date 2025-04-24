<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    protected $table = 'contrats';

    protected $fillable = [
        'id_lot',
        'id_entité',
        'binaire',
    ];

    public function lot() {
        return $this->belongsTo(Lot::class, 'id_lot');
    }

    public function entité() {
        return $this->belongsTo(Entité::class, 'id_entité');
    }
}

