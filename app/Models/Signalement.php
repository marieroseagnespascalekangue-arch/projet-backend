<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Appointment;

class Signalement extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'prenom',
        'nom',
        'tranche',
        'zone',
        'symptomes',
        'symptomes_labels',
        'duree',
        'duree_label',
        'intensite',
        'intensite_label',
        'notes',
        'date_signalement',
        'statut',
        'converted_to_patient_id',
    ];

    protected $casts = [
        'symptomes' => 'array',
        'symptomes_labels' => 'array',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
