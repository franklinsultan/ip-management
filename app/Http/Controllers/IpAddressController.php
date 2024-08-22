<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IpAddress;
use App\AuditLog;
use Illuminate\Support\Facades\Auth;

class IpAddressController extends Controller
{

    public function index()
    {
        return IpAddress::all();
    }

    public function show($id)
    {
        $findIpAddress = IpAddress::findOrFail($id);

        return response()->json([
            'data' => $findIpAddress
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'ip_address' => 'required|ip|unique:ip_addresses,ip_address',
            'label' => 'nullable|string|max:255',
        ]);

        $ipAddress = IpAddress::create([
            'ip_address' => $request->ip_address,
            'label' => $request->label,
        ]);

        AuditLog::create([
            'details' => "Added IP: {$ipAddress->ip_address}, label: {$ipAddress->label}",
            'user_id' => Auth::id(),
        ]);

        return response()->json([
            'message' => 'IP address added successfully',
            'data' => $ipAddress
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'label' => 'nullable|string|max:255',
        ]);

        $findIpAddress = IpAddress::findOrFail($id);
        $oldLabel = $findIpAddress->label;
        $findIpAddress->label = $request->label;
        $findIpAddress->save();

        AuditLog::create([
            'details' => "Updated label for: {$findIpAddress->ip_address}, from {$oldLabel} to {$findIpAddress->label}",
            'user_id' => Auth::id()
        ]);

        return response()->json([
            'message' => 'IP address label successfully updated',
            'data' => $findIpAddress
        ]);
    }
}
