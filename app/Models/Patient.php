<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'prenom',
        'nom',
        'age',
        'sexe',
        'quartier',
        'diagnostic',
        'statut',
        'date_admission',
        'derniere',
        'tel',
        'email',
        'date_naissance',
        'groupe_sanguin',
        'allergies',
        'antecedents',
        'traitement',
        'poids',
        'taille',
        'tension',
        'temperature',
        'observations',
        'medecin',
        'consultations',
        'note',
    ];

    protected $casts = [
        'consultations' => 'array',
        'age' => 'integer',
        'note' => 'float',
    ];
}
