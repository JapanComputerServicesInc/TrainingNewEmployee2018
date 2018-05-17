<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeesController extends Controller
{
    public function new()
    {
        return view('employees.edit');
    }

    public function create(Request $request)
    {
        $employee = Employee::create([
            'employee_no' => $request->employee_no,
            'name' => $request->name
        ]);

        dd($employee);
    }
}
