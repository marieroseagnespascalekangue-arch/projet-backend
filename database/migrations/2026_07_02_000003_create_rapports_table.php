<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rapports', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('titre');
            $table->text('description')->nullable();
            $table->string('categorie');
            $table->string('statut');
            $table->string('date_generation');
            $table->string('auteur');
            $table->string('auteur_initials')->nullable();
            $table->string('taille')->nullable();
            $table->string('type')->nullable();
            $table->json('tags')->nullable();
            $table->unsignedInteger('vues')->nullable();
            $table->float('note')->nullable();
            $table->string('district')->nullable();
            $table->string('periode')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rapports');
    }
};
