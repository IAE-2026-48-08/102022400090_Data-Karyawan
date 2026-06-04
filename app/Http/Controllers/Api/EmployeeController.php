<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return Employee::all();
    }

public function show($id)
{
    $employee = Employee::find($id);

    if (!$employee) {
        return response()->json([
            'status' => 'error',
            'message' => 'Employee not found',
            'errors' => null
        ], 404);
    }

    return response()->json([
        'status' => 'success',
        'message' => 'Data retrieved successfully',
        'data' => $employee,
        'meta' => [
            'service_name' => 'Data-Karyawan-Service',
            'api_version' => 'v1'
        ]
    ]);
}
    public function store(Request $request)
{
    $employee = Employee::create([
        'nip' => $request->nip,
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
        'departemen' => $request->departemen,
        'gaji_pokok' => $request->gaji_pokok,
        'email' => $request->email
    ]);

    return response()->json([
        'status' => 'success',
        'message' => 'Employee created successfully',
        'data' => $employee,
        'meta' => [
            'service_name' => 'Data-Karyawan-Service',
            'api_version' => 'v1'
        ]
    ], 201);
}
}