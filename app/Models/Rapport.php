<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'titre',
        'description',
        'categorie',
        'statut',
        'date_generation',
        'auteur',
        'auteur_initials',
        'taille',
        'type',
        'tags',
        'vues',
        'note',
        'district',
        'periode',
    ];

    protected $casts = [
        'tags' => 'array',
        'vues' => 'integer',
        'note' => 'float',
    ];
}
