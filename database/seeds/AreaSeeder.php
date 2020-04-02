<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\AreaKlasifikasi::insert([
            [
                'kd_area' => 'AR-001',
                'klasifikasi_area' => 'Rumah Dinas'
            ],
            [
                'kd_area' => 'AR-002',
                'klasifikasi_area' => 'Kantor Graha'
            ]
        ]);

        \App\AreaAlamat::insert([

            [
                'kd_alamat' => 'AL-001',
                'alamat' => 'Jl. ABC No. 123',
                'kd_area' => 'AR-001'
            ],
            [
                'kd_alamat' => 'AL-002',
                'alamat' => 'Jl. EFG No. 4a',
                'kd_area' => 'AR-001'
            ],
            [
                'kd_alamat' => 'AL-003',
                'alamat' => 'Jl. Deleg No. 66',
                'kd_area' => 'AR-002'
            ],
            [
                'kd_alamat' => 'AL-004',
                'alamat' => 'Jl. ABC No. 123',
                'kd_area' => 'AR-002',
            ]
        ]);

        \App\AreaKeterangan::insert([
            [
                'kd_keterangan' => 'KT-001',
                'keterangan' => 'Keterangan Alamat ABC 1',
                'kd_alamat' => 'AL-001'
            ],
            [
                'kd_keterangan' => 'KT-002',
                'keterangan' => 'Keterangan Alamat ABC 2',
                'kd_alamat' => 'AL-001'
            ],
            [
                'kd_keterangan' => 'KT-003',
                'keterangan' => 'Keterangan Alamat EFG 1',
                'kd_alamat' => 'AL-002'
            ],
            [
                'kd_keterangan' => 'KT-004',
                'keterangan' => 'Keterangan Alamat EFG 2',
                'kd_alamat' => 'AL-002'
            ],
            [
                'kd_keterangan' => 'KT-005',
                'keterangan' => 'Keterangan Alamat Deleg 1',
                'kd_alamat' => 'AL-003'
            ],
            [
                'kd_keterangan' => 'KT-006',
                'keterangan' => 'Keterangan Alamat Deleg 2',
                'kd_alamat' => 'AL-003'
            ],
            [
                'kd_keterangan' => 'KT-007',
                'keterangan' => 'Keterangan Alamat Terakhir 1',
                'kd_alamat' => 'AL-004'
            ],
            [
                'kd_keterangan' => 'KT-008',
                'keterangan' => 'Keterangan Alamat Terakhir 2',
                'kd_alamat' => 'AL-004'
            ]
        ]);
    }
}
