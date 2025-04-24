<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entité extends Model
{
    use HasFactory;

    protected $table = 'entités';

    protected $fillable = [
        'id_contrat',
        'id_adress',
        'nom',
        'type',
        'logo',
    ];

    public function contrat() {
        return $this->belongsTo(Contrat::class, 'id_contrat');
    }

    public function adresse() {
        return $this->belongsTo(Adresse::class, 'id_adress');
    }
}

