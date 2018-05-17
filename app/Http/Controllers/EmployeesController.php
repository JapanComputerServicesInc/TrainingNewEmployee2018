<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\EmployeeCreateRequest;
use App\Http\Requests\EmployeeUpdateRequest;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(2);

        return view('employees.index')->with(['employees' => $employees]);
    }

    public function new()
    {
        return view('employees.new');
    }

    public function create(EmployeeCreateRequest $request)
    {
        $employee = Employee::create([
            'employee_no' => $request->employee_no,
            'name' => $request->name
        ]);

        $request->session()->flash('success_message', '登録が完了しました。');

        return redirect()->route('employees.edit', ['id' => $employee->id]);
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit')->with(['employee' => $employee]);
    }

    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        $employee->update([
            'employee_no' => $request->employee_no,
            'name' => $request->name
        ]);

        $request->session()->flash('success_message', '更新が完了しました。');

        return redirect()->route('employees.edit', ['id' => $employee->id]);
    }
}
