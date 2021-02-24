<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SifatSurat extends Model
{
    protected $fillable = [
        'sifat_surat', 'created_by', 'updated_by',
    ];
}
