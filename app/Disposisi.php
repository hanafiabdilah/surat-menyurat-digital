<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    protected $fillable = ['id_transaksi_surat', 'tujuan', 'sifat_surat', 'isi_ringkas', 'batas_waktu', 'created_by', 'updated_by', 'catatan'];

    protected $dates = ['batas_waktu'];

    public function transaksisurats()
    {
        return $this->belongsTo(TransaksiSurat::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
