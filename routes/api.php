<?php

use App\Http\Controllers\AuthController; // <-- Nouveau contrôleur pour l'authentification
use App\Http\Controllers\AlerteController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\SignalementController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// ==========================================
// 1. ROUTES PUBLIQUES (Accessibles sans être connecté)
// ==========================================

// Inscription et Connexion des agents / admins
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Permettre au frontend de voir les districts (ex: pour afficher la carte Leaflet au démarrage)
Route::get('/districts', [DistrictController::class, 'index']);


// ==========================================
// 2. ROUTES PROTÉGÉES (Connexion requise via un Token Sanctum)
// ==========================================
Route::middleware('auth:sanctum')->group(function () {
    
    // Déconnexion
    Route::post('/logout', [AuthController::class, 'logout']);

    // Gestion complète de vos ressources métier (CRUD sécurisé)
    Route::apiResource('signalements', SignalementController::class);
    Route::apiResource('patients', PatientController::class);
    Route::apiResource('rapports', RapportController::class);
    Route::apiResource('alertes', AlerteController::class);
    // Appointments attached to a signalement
    Route::get('signalements/{signalement}/appointments', [AppointmentController::class, 'index']);
    Route::post('signalements/{signalement}/appointments', [AppointmentController::class, 'store']);
    // Appointments attached to a patient (non-signalement patients)
    Route::get('patients/{patientId}/appointments', [AppointmentController::class, 'indexForPatient']);
    Route::post('patients/{patientId}/appointments', [AppointmentController::class, 'storeForPatient']);
    
    // Actions restreintes sur les districts (créer, modifier ou supprimer un district)
    Route::apiResource('districts', DistrictController::class)->except(['index']);
});