<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeeController;
use App\Models\Employee;

Route::middleware('api.key')->group(function () {

    Route::get('/v1/employees', [EmployeeController::class, 'index']);

    Route::get('/v1/employees/{id}', [EmployeeController::class, 'show']);

    Route::post('/v1/employees', [EmployeeController::class, 'store']);

});

Route::get('/test-insert', function () {
    Employee::create([
        'nip' => 'EMP001',
        'nama' => 'Budi Santoso',
        'jabatan' => 'HR Staff',
        'departemen' => 'Human Resource',
        'gaji_pokok' => 5000000,
        'email' => 'budi@gmail.com'
    ]);

    return 'Data berhasil ditambahkan';
});