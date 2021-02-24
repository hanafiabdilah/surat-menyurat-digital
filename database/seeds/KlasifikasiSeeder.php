<?php

use Illuminate\Database\Seeder;
use App\Klasifikasi;

class KlasifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Klasifikasi::create([
            'nama' => 'Hanafi Abdilah',
            'jabatan' => 'Kepala Sekolah',
            'created_by' => 'admin',
            'updated_by' => '',
        ]);
    }
}
