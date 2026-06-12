<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pegawai;
use App\Models\Training;

class PegawaiTrainingSeeder extends Seeder {
    public function run(): void {
        $pegawaiIds = [
            Pegawai::where('nim', 'EMP001')->value('id'),
            Pegawai::where('nim', 'EMP002')->value('id'),
        ];

        $trainingIds = [
            Training::where('nama_training', 'Laravel Basic')->value('id'),
            Training::where('nama_training', 'Communication Skill')->value('id'),
            Training::where('nama_training', 'Leadership Training')->value('id'),
        ];

        if (in_array(null, $pegawaiIds, true) || in_array(null, $trainingIds, true)) {
            throw new \RuntimeException('Pegawai atau training belum tersedia saat menjalankan PegawaiTrainingSeeder.');
        }

        DB::table('pegawai_training')->insert([
            [
                'pegawai_id' => $pegawaiIds[0],
                'training_id' => $trainingIds[0],
                'status' => 'Selesai'
            ],

            [
                'pegawai_id' => $pegawaiIds[1],
                'training_id' => $trainingIds[1],
                'status' => 'Mengikuti'
            ],

            [
                'pegawai_id' => $pegawaiIds[0],
                'training_id' => $trainingIds[2],
                'status' => 'Terdaftar'
            ],
        ]);
    }
}
