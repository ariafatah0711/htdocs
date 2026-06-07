<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Divisi;

class DivisiSeeder extends Seeder {
    public function run(): void {
        Divisi::insert([
            ['nama_divisi' => 'IT'],
            ['nama_divisi' => 'HRD'],
            ['nama_divisi' => 'Keuangan']
        ]);
    }
}
