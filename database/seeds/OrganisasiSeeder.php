<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Departemen::insert([
            [
                'kd_departemen' => 'DEP0001',
                'departemen' => 'Pelayanan Umum'
            ]
        ]);

        \App\Bagian::insert([
            [
                'kd_bagian' => 'BAG0001',
                'bagian' => 'Transport',
                'kd_departemen' => 'DEP0001'
            ],
            [
                'kd_bagian' => 'BAG0002',
                'bagian' => 'Sarana & Perlengkapan',
                'kd_departemen' => 'DEP0001'
            ],
            [
                'kd_bagian' => 'BAG0003',
                'bagian' => 'Pemeliharaan Kawasan',
                'kd_departemen' => 'DEP0001'
            ]
        ]);

        \App\Seksi::insert([
            [
                'kd_seksi' => 'SIE0001',
                'Seksi' => 'Sipil',
                'kd_bagian' => 'BAG0003'
            ],
            [
                'kd_seksi' => 'SIE0002',
                'Seksi' => 'Bengkel',
                'kd_bagian' => 'BAG0003'
            ],
            [
                'kd_seksi' => 'SIE0003',
                'Seksi' => 'Listrik, Instrumen & Telkom',
                'kd_bagian' => 'BAG0003'
            ],
            [
                'kd_seksi' => 'SIE0004',
                'Seksi' => 'Administrasi Kendaraan',
                'kd_bagian' => 'BAG0001'
            ],
            [
                'kd_seksi' => 'SIE0005',
                'Seksi' => 'Operasional Transport',
                'kd_bagian' => 'BAG0001'
            ],
            
        ]);

        \App\Regu::insert([
            [
                'kd_regu' => 'RU0001',
                'regu' => 'Gedung & Jalan',
                'kd_seksi' => 'SIE0001'
            ],
            [
                'kd_regu' => 'RU0002',
                'regu' => 'Perumahan Dinas',
                'kd_seksi' => 'SIE0001'
            ],
            [
                'kd_regu' => 'RU0003',
                'regu' => 'Pipa & Las',
                'kd_seksi' => 'SIE0002'
            ],
            [
                'kd_regu' => 'RU0004',
                'regu' => 'Mekanik & Pendingin',
                'kd_seksi' => 'SIE0002'
            ],
            [
                'kd_regu' => 'RU0005',
                'regu' => 'Listrik Perumahan & Perkantoran',
                'kd_seksi' => 'SIE0003'
            ],
            [
                'kd_regu' => 'RU0006',
                'regu' => 'Instrumen & Telkom',
                'kd_seksi' => 'SIE0003'
            ],
            [
                'kd_regu' => 'RU0007',
                'regu' => 'Pemancar, Sound System & Pagging',
                'kd_seksi' => 'SIE0003'
            ],
            [
                'kd_regu' => 'RU0008',
                'regu' => 'Dekorasi & Pekerjaan Kayu',
                'kd_seksi' => 'SIE0001'
            ],
            [
                'kd_regu' => 'RU0009',
                'regu' => 'Administrasi Kendaraan',
                'kd_seksi' => 'SIE0004'
            ],
            [
                'kd_regu' => 'RU0010',
                'regu' => 'Perawatan Kendaraan',
                'kd_seksi' => 'SIE0005'
            ],
            [
                'kd_regu' => 'RU0011',
                'regu' => 'Operasional Non Shift',
                'kd_seksi' => 'SIE0005'
            ],
            [
                'kd_regu' => 'RU0012',
                'regu' => 'Operasional Shift A',
                'kd_seksi' => 'SIE0005'
            ],
            [
                'kd_regu' => 'RU0013',
                'regu' => 'Operasional Shift B',
                'kd_seksi' => 'SIE0005'
            ],
            [
                'kd_regu' => 'RU0014',
                'regu' => 'Operasional Shift C',
                'kd_seksi' => 'SIE0005'
            ],
            [
                'kd_regu' => 'RU0015',
                'regu' => 'Operasional Shift D',
                'kd_seksi' => 'SIE0005'
            ],
        ]);

    }
}
