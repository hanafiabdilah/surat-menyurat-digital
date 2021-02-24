<?php

use Illuminate\Database\Seeder;
use App\TransaksiSurat;

class TransaksiSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksi_surats')->insert([
            [
                'no_agenda' => '08834',
                'pengirim' => 'PT Sejahtera',
                'no_surat' => 'X11-889',
                'isi_ringkas' => 'isi ringkas',
                'tanggal_surat' => now(),
                'tanggal_diterima' => now(),
                'keterangan' => 'keterangan',
                'kategori' => 'in',
                'created_by' => 'admin',
                'updated_by' => '',
            ],
            [
                'no_agenda' => '08834',
                'pengirim' => 'PT Sejahtera',
                'no_surat' => 'X11-889',
                'isi_ringkas' => 'isi ringkas',
                'tanggal_surat' => now(),
                'tanggal_diterima' => now(),
                'keterangan' => 'keterangan',
                'kategori' => 'out',
                'created_by' => 'admin',
                'updated_by' => '',
            ]
        ]);
    }
}
