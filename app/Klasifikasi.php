<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    protected $fillable = [
        'nama', 'jabatan', 'created_by', 'updated_by',
    ];
}
