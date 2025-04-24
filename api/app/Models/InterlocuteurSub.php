<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterlocuteurSub extends Model
{
    use HasFactory;

    protected $table = 'interlocuteur_subs';

    protected $fillable = [
        'id_user',
        'id_entité',
        'téléphone',
        'e_mail_contact',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function entité() {
        return $this->belongsTo(Entité::class, 'id_entité');
    }
}

