<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\AuditLog;


class AuditLogController extends Controller
{
    public function index()
    {
        $logs = AuditLog::with('user')->orderBy('created_at', 'desc')->get();

        return response()->json($logs);
    }
}
