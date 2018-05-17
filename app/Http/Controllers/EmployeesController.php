<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Http\Requests\EmployeeCreateRequest;

class EmployeesController extends Controller
{
    public function new()
    {
        return view('employees.edit');
    }

    public function create(EmployeeCreateRequest $request)
    {
        $employee = Employee::create([
            'employee_no' => $request->employee_no,
            'name' => $request->name
        ]);

        dd($employee);
    }
}
