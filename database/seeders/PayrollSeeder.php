<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use App\Models\Payroll;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PayrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $karyawans = Karyawan::all();
        $tahun = Carbon::now()->year;

        foreach ($karyawans as $karyawan) {
            for ($bulan = 1; $bulan <= 12; $bulan++) {
                Payroll::create([
                    'karyawan_id' => $karyawan->id,
                    'periode' => Carbon::create($tahun, $bulan, 1)->format('Y-m-d'),
                    'gaji_pokok' => rand(4000000, 8000000),
                    'tunjangan' => rand(500000, 2000000),
                    'potongan' => rand(100000, 500000),
                    'total_gaji' => function ($attributes) {
                        return $attributes['gaji_pokok'] + $attributes['tunjangan'] - $attributes['potongan'];
                    },
                ]);
            }
        }
    }
}
