<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('prenom');
            $table->string('nom');
            $table->unsignedInteger('age');
            $table->string('sexe');
            $table->string('quartier');
            $table->string('diagnostic');
            $table->string('statut');
            $table->string('date_admission');
            $table->string('derniere');
            $table->string('tel');
            $table->string('email')->nullable();
            $table->string('date_naissance')->nullable();
            $table->string('groupe_sanguin')->nullable();
            $table->string('allergies')->nullable();
            $table->text('antecedents')->nullable();
            $table->text('traitement')->nullable();
            $table->string('poids')->nullable();
            $table->string('taille')->nullable();
            $table->string('tension')->nullable();
            $table->string('temperature')->nullable();
            $table->text('observations')->nullable();
            $table->string('medecin')->nullable();
            $table->json('consultations')->nullable();
            $table->float('note')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
