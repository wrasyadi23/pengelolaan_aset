<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            'nama' => 'Muhammad Wava',
            'nik' => 'T545446',
            'email' => 'wava@gmail.com',
            'role' => 'Admin',
            'password' => Hash::make('rahasiakita'),
            'remember_token' => Str::random(60)
        ]);

        \App\Karyawan::insert([
            'nama' => 'Muhammad Wava',
            'nik' => 'T545446',
            'tempat_lahir' => 'Surabaya',
            'tanggal_lahir' => '1993-06-23',
            'jenis_kelamin' => 'L',
            'kd_departemen' => 'DEP0001',
            'kd_bagian' => 'BAG0003',
            'kd_seksi' => 'SIE0001',
            'kd_regu' => 'RU0002',
            'status' => 'Aktif'
        ]);
    }
}
