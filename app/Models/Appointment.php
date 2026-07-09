<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Signalement;
use App\Models\Patient;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'signalement_id',
        'patient_id',
        'scheduled_at',
        'note',
        'created_by',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    public function signalement()
    {
        return $this->belongsTo(Signalement::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }
}
