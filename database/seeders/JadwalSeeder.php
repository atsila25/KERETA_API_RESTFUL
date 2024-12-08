<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Jadwal;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pastikan tabel jadwal kosong sebelum insert data
        DB::table('jadwal')->truncate();

        // Parameter data random
        $keretaRange = range(1, 4); // ID kereta dari 1-4
        $stasiunRange = range(1, 15); // ID stasiun dari 1-15
        $tanggalRange = range(10, 30); // Tanggal 10-30 Desember 2024
        $jamOptions = ['06:00:00', '09:00:00', '12:00:00', '15:00:00', '18:00:00']; // Jam keberangkatan random

        // Loop untuk memasukkan data
        for ($i = 0; $i < 100; $i++) {
            $stasiunAsal = $stasiunRange[array_rand($stasiunRange)];
            $stasiunTujuan = $stasiunRange[array_rand($stasiunRange)];

            // Pastikan stasiun asal dan tujuan tidak sama
            while ($stasiunTujuan === $stasiunAsal) {
                $stasiunTujuan = $stasiunRange[array_rand($stasiunRange)];
            }

            Jadwal::create([
                'kereta_id' => $keretaRange[array_rand($keretaRange)],
                'stasiun_asal_id' => $stasiunAsal,
                'stasiun_tujuan_id' => $stasiunTujuan,
                'tanggal' => "2024-12-" . str_pad($tanggalRange[array_rand($tanggalRange)], 2, '0', STR_PAD_LEFT),
                'jam' => $jamOptions[array_rand($jamOptions)],
            ]);
        }
    }
}
