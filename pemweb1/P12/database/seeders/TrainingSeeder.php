<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Training;

class TrainingSeeder extends Seeder {
    public function run(): void {
        Training::insert([
            [
                'jenis_training_id' => 1,
                'nama_training' => 'Laravel Basic',
                'penyelenggara' => 'Internal',
                'tanggal_training' => '2026-01-10',
                'lokasi' => 'Jakarta'
            ],

            [
                'jenis_training_id' => 2,
                'nama_training' => 'Communication Skill',
                'penyelenggara' => 'External',
                'tanggal_training' => '2026-02-15',
                'lokasi' => 'Bandung'
            ],

            [
                'jenis_training_id' => 3,
                'nama_training' => 'Leadership Training',
                'penyelenggara' => 'HR Consultant',
                'tanggal_training' => '2026-03-20',
                'lokasi' => 'Surabaya'
            ]
        ]);
    }
}
