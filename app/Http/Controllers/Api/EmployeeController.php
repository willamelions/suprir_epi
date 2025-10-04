<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        return Employee::paginate(50);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'cpf' => 'required|string|unique:employees,cpf',
            'role' => 'required|string',
            'site_id' => 'required|integer|exists:obras,id',
            'active' => 'boolean',
        ]);
        $employee = Employee::create($data);
        return response()->json($employee, 201);
    }

    public function show(Employee $employee)
    {
        return $employee;
    }

    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string',
            'cpf' => 'sometimes|required|string|unique:employees,cpf,'.$employee->id,
            'role' => 'sometimes|required|string',
            'site_id' => 'sometimes|required|integer|exists:obras,id',
            'active' => 'boolean',
        ]);
        $employee->update($data);
        return $employee;
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(['message' => 'deleted']);
    }
}
