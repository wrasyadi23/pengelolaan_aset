<?php

use Illuminate\Database\Seeder;

class KapasitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\PekerjaanKapasitas::insert([
            [
                'kapasitas' => '3',
                'kd_regu' => 'RU0001',
            ],
            [
                'kapasitas' => '5',
                'kd_regu' => 'RU0002',
            ],
            [
                'kapasitas' => '4',
                'kd_regu' => 'RU0003',
            ],
            [
                'kapasitas' => '5',
                'kd_regu' => 'RU0004',
            ],
            [
                'kapasitas' => '5',
                'kd_regu' => 'RU0005',
            ],
            [
                'kapasitas' => '5',
                'kd_regu' => 'RU0006',
            ],
            [
                'kapasitas' => '5',
                'kd_regu' => 'RU0007',
            ],
            [
                'kapasitas' => '3',
                'kd_regu' => 'RU0008',
            ],
        ]);
    }
}
