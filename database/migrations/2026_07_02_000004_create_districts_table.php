<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nom');
            $table->string('region');
            $table->string('id_code')->nullable();
            $table->text('description')->nullable();
            $table->string('statut')->nullable();
            $table->unsignedInteger('cas24h')->nullable();
            $table->float('taux')->nullable();
            $table->string('risque')->nullable();
            $table->string('tendance')->nullable();
            $table->unsignedInteger('cas_actifs')->nullable();
            $table->float('taux_transmission')->nullable();
            $table->json('chart_data')->nullable();
            $table->string('last_update')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};
