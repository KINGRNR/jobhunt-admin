<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LogController extends Controller
{
    public function showLog()
    {
        $logFilePath = storage_path('logs/laravel.log');
        $logContents = file_get_contents($logFilePath);
        $logLines = explode("\n", $logContents);

        
        return response()->json(['log' => $logLines]);
    }
}
