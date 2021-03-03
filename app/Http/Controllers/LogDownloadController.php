<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\LogDownload;
use File;

class LogDownloadController extends Controller
{
    public function index()
    {
        $logDownloads = LogDownload::all();
        return view('log_download.index', compact('logDownloads'));
    }

    public function destroy($id)
    {
        $logDownload = LogDownload::find($id);
        $file = public_path($logDownload->file);
        File::delete($file);
        $logDownload->delete();
        return back()->with('success', 'Log Download berhasil dihapus');
    }
}
