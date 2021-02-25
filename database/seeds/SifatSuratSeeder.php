<?php

use Illuminate\Database\Seeder;
use App\SifatSurat;

class SifatSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SifatSurat::create([
            'sifat_surat' => 'Tidak Penting',
            'created_by' => '1',
            'updated_by' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
