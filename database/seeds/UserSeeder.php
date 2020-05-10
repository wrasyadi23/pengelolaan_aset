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
            [
                'nama' => 'Muhammad Wava',
                'nik' => 'T545446',
                'email' => 'wava@gmail.com',
                'role' => 'Admin',
                'password' => Hash::make('rahasiakita'),
                'remember_token' => Str::random(60)
            ],
            [
                'nama' => 'M. Fajar bukhori',
                'nik' => 'T545434',
                'email' => 'fajar@gmail.com',
                'role' => 'User',
                'password' => Hash::make('rahasiakita'),
                'remember_token' => Str::random(60)
            ],
            [
                'nama' => 'Rizal Fahrudin A',
                'nik' => 'T545556',
                'email' => 'rizal@gmail.com',
                'role' => 'User',
                'password' => Hash::make('rahasiakita'),
                'remember_token' => Str::random(60)
            ],
            
        ]);

        \App\Karyawan::insert([
            [
                'nama' => 'Muhammad Wava',
                'nik' => 'T545446',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1993-06-23',
                'jenis_kelamin' => 'L',
                'jabatan' => 'Pelaksana',
                'golongan' => '6A',
                'kd_departemen' => 'DEP0001',
                'kd_bagian' => 'BAG0003',
                'kd_seksi' => 'SIE0001',
                'kd_regu' => 'RU0002',
                'status' => 'Aktif'
            ],
            [
                'nama' => 'M. Fajar Bukhori',
                'nik' => 'T545434',
                'tempat_lahir' => 'Gresik',
                'tanggal_lahir' => '1993-04-15',
                'jenis_kelamin' => 'L',
                'jabatan' => 'Pelaksana',
                'golongan' => '6A',
                'kd_departemen' => 'DEP0001',
                'kd_bagian' => 'BAG0003',
                'kd_seksi' => 'SIE0001',
                'kd_regu' => 'RU0002',
                'status' => 'Aktif'
            ],
            [
                'nama' => 'Rizal Fahrudin A',
                'nik' => 'T545556',
                'tempat_lahir' => 'Mojokerto',
                'tanggal_lahir' => '1993-04-23',
                'jenis_kelamin' => 'L',
                'jabatan' => 'Pelaksana',
                'golongan' => '6A',
                'kd_departemen' => 'DEP0001',
                'kd_bagian' => 'BAG0003',
                'kd_seksi' => 'SIE0001',
                'kd_regu' => 'RU0002',
                'status' => 'Aktif'
            ],
        ]);
    }
}
