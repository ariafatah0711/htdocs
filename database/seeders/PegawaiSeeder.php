<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pegawai;

class PegawaiSeeder extends Seeder {
    public function run(): void {
        Pegawai::insert([
            [
                'user_id' => 1,
                'nim' => 'EMP001',
                'nama' => 'Andi Pratama',
                'gender' => 'Laki-laki',
                'divisi_id' => 1,
                'jabatan_id' => 1,
                'tmp_lahir' => 'Jakarta',
                'tgl_lahir' => '1995-01-10',
                'hp' => '081234567890',
                'alamat' => 'Jakarta Selatan',
                'foto' => null
            ],

            [
                'user_id' => 2,
                'nim' => 'EMP002',
                'nama' => 'Siti Aminah',
                'gender' => 'Perempuan',
                'divisi_id' => 2,
                'jabatan_id' => 2,
                'tmp_lahir' => 'Bandung',
                'tgl_lahir' => '1996-05-12',
                'hp' => '081298765432',
                'alamat' => 'Bandung',
                'foto' => null
            ]
        ]);
    }
}
