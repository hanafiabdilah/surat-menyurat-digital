<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    protected $fillable = ['id_transaksi_surat', 'tujuan', 'sifat_surat', 'isi_ringkas', 'batas_waktu', 'catatan'];

    protected $dates = ['batas_waktu'];

    public function transaksisurats()
    {
        return $this->belongsTo(TransaksiSurat::class);
    }
}
