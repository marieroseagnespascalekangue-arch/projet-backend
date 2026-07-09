<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create a new table with the desired schema
        Schema::create('appointments_new', function (Blueprint $table) {
            $table->id();
            $table->string('signalement_id')->nullable();
            $table->string('patient_id')->nullable();
            $table->dateTime('scheduled_at');
            $table->text('note')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
        });

        // Copy existing data, set signalement_id to null when not present
        if (Schema::hasTable('appointments')) {
            $rows = DB::table('appointments')->get();
            foreach ($rows as $r) {
                DB::table('appointments_new')->insert([
                    'id' => $r->id,
                    'signalement_id' => property_exists($r, 'signalement_id') ? $r->signalement_id : null,
                    'patient_id' => property_exists($r, 'patient_id') ? $r->patient_id : null,
                    'scheduled_at' => $r->scheduled_at,
                    'note' => $r->note,
                    'created_by' => $r->created_by ?? null,
                    'created_at' => $r->created_at,
                    'updated_at' => $r->updated_at,
                ]);
            }

            Schema::drop('appointments');
        }

        Schema::rename('appointments_new', 'appointments');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Not implementing full rollback for simplicity: recreate original table if needed
        if (Schema::hasTable('appointments')) {
            Schema::create('appointments_old', function (Blueprint $table) {
                $table->id();
                $table->string('signalement_id');
                $table->string('patient_id')->nullable();
                $table->dateTime('scheduled_at');
                $table->text('note')->nullable();
                $table->unsignedBigInteger('created_by')->nullable();
                $table->timestamps();
            });

            $rows = DB::table('appointments')->get();
            foreach ($rows as $r) {
                DB::table('appointments_old')->insert([
                    'id' => $r->id,
                    'signalement_id' => $r->signalement_id ?? '',
                    'patient_id' => $r->patient_id ?? null,
                    'scheduled_at' => $r->scheduled_at,
                    'note' => $r->note,
                    'created_by' => $r->created_by ?? null,
                    'created_at' => $r->created_at,
                    'updated_at' => $r->updated_at,
                ]);
            }

            Schema::drop('appointments');
            Schema::rename('appointments_old', 'appointments');
        }
    }
};
