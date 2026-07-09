<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Signalement;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Signalement $signalement)
    {
        $appointments = $signalement->appointments()->orderBy('scheduled_at', 'asc')->get();
        return response()->json($appointments);
    }

    public function store(Request $request, Signalement $signalement)
    {
        $data = $request->validate([
            'scheduledAt' => 'required|date',
            'note' => 'nullable|string',
        ]);

        $appt = Appointment::create([
            'signalement_id' => $signalement->id,
            'scheduled_at' => $data['scheduledAt'],
            'note' => $data['note'] ?? null,
            'created_by' => $request->user()?->id ?? null,
        ]);

        return response()->json($appt->load('signalement'), 201);
    }

    // appointments for patient id
    public function indexForPatient(string $patientId)
    {
        $appointments = Appointment::where('patient_id', $patientId)->orderBy('scheduled_at', 'asc')->get();
        return response()->json($appointments);
    }

    public function storeForPatient(Request $request, string $patientId)
    {
        $data = $request->validate([
            'scheduledAt' => 'required|date',
            'note' => 'nullable|string',
        ]);

        $appt = Appointment::create([
            'patient_id' => $patientId,
            'scheduled_at' => $data['scheduledAt'],
            'note' => $data['note'] ?? null,
            'created_by' => $request->user()?->id ?? null,
        ]);

        return response()->json($appt, 201);
    }
}
