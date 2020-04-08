<?php

use Illuminate\Database\Seeder;

class KlasifikasiPekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\PekerjaanKlasifikasi::insert([
            [
                'kd_klasifikasi_pekerjaan' => 'KP00001',
                'klasifikasi_pekerjaan' => 'Perbaikan Gedung/Bangunan Perkantoran',
                'kd_regu' => 'RU0001'
            ],
            [
                'kd_klasifikasi_pekerjaan' => 'KP00002',
                'klasifikasi_pekerjaan' => 'Perbaikan Jalan',
                'kd_regu' => 'RU0001'
            ],
            [
                'kd_klasifikasi_pekerjaan' => 'KP00003',
                'klasifikasi_pekerjaan' => 'Perbaikan Gedung/Bangunan Rumah Dinas',
                'kd_regu' => 'RU0002'
            ],
            [
                'kd_klasifikasi_pekerjaan' => 'KP00004',
                'klasifikasi_pekerjaan' => 'Perbaikan Pipa',
                'kd_regu' => 'RU0003'
            ],
            [
                'kd_klasifikasi_pekerjaan' => 'KP00005',
                'klasifikasi_pekerjaan' => 'Pengelasan (Welding)',
                'kd_regu' => 'RU0003'
            ],
            [
                'kd_klasifikasi_pekerjaan' => 'KP00006',
                'klasifikasi_pekerjaan' => 'Pekerjaan Mekanik',
                'kd_regu' => 'RU0004'
            ],
            [
                'kd_klasifikasi_pekerjaan' => 'KP00007',
                'klasifikasi_pekerjaan' => 'Pekerjaan Sistem Pendingin',
                'kd_regu' => 'RU0004'
            ],
            [
                'kd_klasifikasi_pekerjaan' => 'KP00008',
                'klasifikasi_pekerjaan' => 'Perbaikan Listrik Rumah Dinas',
                'kd_regu' => 'RU0005'
            ],
            [
                'kd_klasifikasi_pekerjaan' => 'KP00009',
                'klasifikasi_pekerjaan' => 'Perbaikan Listrik Gedung/Kantor',
                'kd_regu' => 'RU0005'
            ],
            [
                'kd_klasifikasi_pekerjaan' => 'KP00010',
                'klasifikasi_pekerjaan' => 'Pekerjaan Instrumen',
                'kd_regu' => 'RU0006'
            ],
            [
                'kd_klasifikasi_pekerjaan' => 'KP00011',
                'klasifikasi_pekerjaan' => 'Perbaikan Telepon',
                'kd_regu' => 'RU0006'
            ],
            [
                'kd_klasifikasi_pekerjaan' => 'KP00012',
                'klasifikasi_pekerjaan' => 'Perbaikan Pemancar',
                'kd_regu' => 'RU0007'
            ],
            [
                'kd_klasifikasi_pekerjaan' => 'KP00013',
                'klasifikasi_pekerjaan' => 'Perbaikan Pagging',
                'kd_regu' => 'RU0007'
            ]
        ]);
    }
}
