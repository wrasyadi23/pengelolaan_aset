<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Karyawan;

class UserImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection);
        foreach ($collection as $key => $col) {
            if ($key >= 1) {
                User::create([
                    'nama' => $col[0],
                    'nik' => $col[1],
                    'email' => $col[2],
                    'password' => Hash::make($col[3]),
                    'role' => $col[4],
                    'level' => $col[5],
                    'remember_token' => Str::random(60),
                ]);
    
                Karyawan::create([
                    'nama' => $col[0],
                    'nik' => $col[1],
                    'tempat_lahir' => '-',
                    'tanggal_lahir' => '-',
                    'jenis_kelamin' => '-',
                    'jabatan' => '-',
                    'golongan' => '-',
                    'kd_direktorat' => '-',
                    'kd_kompartemen' => '-',
                    'kd_departemen' => '-',
                    'kd_bagian' => '-',
                    'kd_seksi' => '-',
                    'kd_regu' => '-',
                    'status' => 'Aktif',
                ]);
            }
        }
    }
}
