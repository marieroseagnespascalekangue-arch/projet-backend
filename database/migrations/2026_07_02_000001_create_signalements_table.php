<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('signalements', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('prenom');
            $table->string('nom');
            $table->string('tranche');
            $table->string('zone');
            $table->json('symptomes');
            $table->json('symptomes_labels');
            $table->string('duree');
            $table->string('duree_label');
            $table->string('intensite');
            $table->string('intensite_label');
            $table->text('notes')->nullable();
            $table->string('date_signalement');
            $table->string('statut');
            $table->string('converted_to_patient_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('signalements');
    }
};
