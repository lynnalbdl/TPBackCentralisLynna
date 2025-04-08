<?php

namespace App\ModelsDb2;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDb2 extends Model
{
    use HasFactory;

    protected $connection = 'second_db'; // Connexion vers la 2e base

    protected $table = 'UserDb2'; // Optionnel mais clair

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'email_verified_at',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
