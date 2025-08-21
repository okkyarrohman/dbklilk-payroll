<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisi = ['IT', 'Finance', 'HRD', 'Marketing', 'Sales'];
        $subDivisi = ['Support', 'Development', 'Accounting', 'Recruitment', 'Field'];

        for ($i = 1; $i <= 10; $i++) {
            Karyawan::create([
                'hris_id' => $i,
                'nip' => 'NIP' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'nama' => 'Karyawan ' . $i,
                'email' => 'karyawan' . $i . '@example.com',
                'telepon' => '08123' . rand(100000, 999999),
                'divisi' => $divisi[array_rand($divisi)],
                'sub_divisi' => $subDivisi[array_rand($subDivisi)],
                'cabang' => 'Cabang ' . rand(1, 3),
                'tanggal_mulai' => Carbon::now()->subYears(rand(1, 5))->format('Y-m-d'),
                'tanggal_akhir' => Carbon::now()->addYears(rand(1, 3))->format('Y-m-d'),
            ]);
        }
    }
}
