<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogDownload extends Model
{
    public function DownloadBy()
    {
        return $this->belongsTo(User::class, 'download_by');
    }
}
