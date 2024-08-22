<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IpAddress;

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
        $findIpAddress->label = $request->label;
        $findIpAddress->save();

        return response()->json([
            'message' => 'IP address label successfully updated',
            'data' => $findIpAddress
        ]);
    }
}
