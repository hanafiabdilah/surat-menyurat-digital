<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SifatSurat extends Model
{
    protected $fillable = [
        'sifat_surat', 'created_by', 'updated_by',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
