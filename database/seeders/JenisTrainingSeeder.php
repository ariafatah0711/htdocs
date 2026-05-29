<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JenisTraining;

class JenisTrainingSeeder extends Seeder {
    public function run(): void {
        JenisTraining::insert([
            ['nama_jenis' => 'Teknis'],
            ['nama_jenis' => 'Soft Skill'],
            ['nama_jenis' => 'Manajerial']
        ]);
    }
}
