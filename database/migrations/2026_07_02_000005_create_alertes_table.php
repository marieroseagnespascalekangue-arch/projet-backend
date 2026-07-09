<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alertes', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('titre');
            $table->text('description')->nullable();
            $table->string('niveau');
            $table->string('statut');
            $table->string('type');
            $table->string('quartier')->nullable();
            $table->string('district')->nullable();
            $table->unsignedInteger('cas')->nullable();
            $table->string('date_creation')->nullable();
            $table->string('date_modif')->nullable();
            $table->string('responsable')->nullable();
            $table->json('actions')->nullable();
            $table->boolean('escalade')->default(false);
            $table->unsignedInteger('notifications')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alertes');
    }
};
