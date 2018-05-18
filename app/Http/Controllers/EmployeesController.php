<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\EmployeeCreateRequest;
use App\Http\Requests\EmployeeUpdateRequest;

class EmployeesController extends Controller
{
    /**
     * 一覧表示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $employees = Employee::paginate(10);

        return view('employees.index')->with(['employees' => $employees]);
    }

    /**
     * 新規登録画面表示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function new()
    {
        return view('employees.new');
    }

    /**
     * 新規登録
     * @param EmployeeCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(EmployeeCreateRequest $request)
    {
        $employee = Employee::create([
            'employee_no' => $request->employee_no,
            'name' => $request->name
        ]);

        $request->session()->flash('success_message', '登録が完了しました。');

        return redirect()->route('employees.edit', ['id' => $employee->id]);
    }

    /**
     * 編集画面表示
     * @param Employee $employee
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit')->with(['employee' => $employee]);
    }

    /**
     * 更新
     * @param EmployeeUpdateRequest $request
     * @param Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        $employee->update(['name' => $request->name]);

        $request->session()->flash('success_message', '更新が完了しました。');

        return redirect()->route('employees.edit', ['id' => $employee->id]);
    }
}
