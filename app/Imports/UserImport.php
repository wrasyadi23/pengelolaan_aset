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
                'tempat_lahir' => $col[6],
                'tanggal_lahir' => $col[7],
                'jenis_kelamin' => $col[8],
                'jabatan' => $col[9],
                'golongan' => $col[10],
                'kd_direktorat' => $col[11],
                'kd_kompartemen' => $col[12],
                'kd_departemen' => $col[13],
                'kd_bagian' => $col[14],
                'kd_seksi' => $col[15],
                'kd_regus' => $col[16],
                'status' => Aktif,
            ]);
        }
        
    }
}
