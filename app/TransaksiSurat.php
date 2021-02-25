<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiSurat extends Model
{
    protected $fillable = [
        'no_agenda', 'pengirim', 'no_surat', 'isi_ringkas', 'tanggal_surat', 'tanggal_diterima', 'keterangan', 'file', 'kategori', 'created_by', 'updated_by',
    ];

    public $dates = ['tanggal_surat', 'tanggal_diterima'];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
