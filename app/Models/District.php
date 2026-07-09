<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'nom',
        'region',
        'id_code',
        'description',
        'statut',
        'cas24h',
        'taux',
        'risque',
        'tendance',
        'cas_actifs',
        'taux_transmission',
        'chart_data',
        'last_update',
    ];

    protected $casts = [
        'cas24h' => 'integer',
        'taux' => 'float',
        'cas_actifs' => 'integer',
        'taux_transmission' => 'float',
        'chart_data' => 'array',
    ];
}
