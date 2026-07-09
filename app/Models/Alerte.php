<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alerte extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'titre',
        'description',
        'niveau',
        'statut',
        'type',
        'quartier',
        'district',
        'cas',
        'date_creation',
        'date_modif',
        'responsable',
        'actions',
        'escalade',
        'notifications',
    ];

    protected $casts = [
        'actions' => 'array',
        'cas' => 'integer',
        'escalade' => 'boolean',
        'notifications' => 'integer',
    ];
}
