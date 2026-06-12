<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_training_id')
                ->constrained('jenis_trainings')
                ->cascadeOnDelete();
            $table->string('nama_training');
            $table->string('penyelenggara');
            $table->date('tanggal_training');
            $table->string('lokasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
