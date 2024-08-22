<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class AuditLogController extends Controller
{
    public function index()
    {
        $userLogs = User::with('auditLogs')->findOrFail(auth()->id());

        return response()->json($userLogs);
    }
}
