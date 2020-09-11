<?php

use Illuminate\Database\Seeder;
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AreaSeeder::class,
            OrganisasiSeeder::class,
            KlasifikasiPekerjaanSeeder::class,
            UserSeeder::class,
            KapasitasSeeder::class,
        ]);
    }
}
