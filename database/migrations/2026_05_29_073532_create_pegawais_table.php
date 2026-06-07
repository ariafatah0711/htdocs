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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->string('nim')->unique();
            $table->string('nama');
            $table->enum('gender', ['Laki-laki','Perempuan']);
            $table->foreignId('divisi_id')
                ->constrained('divisis')
                ->cascadeOnDelete();
            $table->foreignId('jabatan_id')
                ->constrained('jabatans')
                ->cascadeOnDelete();
            $table->string('tmp_lahir');
            $table->date('tgl_lahir');
            $table->string('hp');
            $table->text('alamat');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
