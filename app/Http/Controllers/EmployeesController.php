<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\Employees\EmployeeCreateRequest;
use App\Http\Requests\Employees\EmployeeUpdateRequest;

class EmployeesController extends Controller
{
    /**
     * 一覧表示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $employees = Employee::with('department')->paginate(10);

        return view('employees.index')->with(['employees' => $employees]);
    }

    /**
     * 新規登録画面表示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function new()
    {
        $departments = Department::all();

        return view('employees.new')->with(['departments' => $departments]);
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
            'name' => $request->name,
            'department_id' => $request->department_id
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
        $departments = Department::all();

        return view('employees.edit')->with(['employee' => $employee, 'departments' => $departments]);
    }

    /**
     * 更新
     * @param EmployeeUpdateRequest $request
     * @param Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        $employee->update([
            'name' => $request->name,
            'department_id' => $request->department_id
        ]);

        $request->session()->flash('success_message', '更新が完了しました。');

        return redirect()->route('employees.edit', ['id' => $employee->id]);
    }

    /**
     * 削除
     * @param Request $request
     * @param Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request, Employee $employee)
    {
        $employee->delete();

        $request->session()->flash('success_message', '削除が完了しました。');

        return redirect()->route('employees.index');
    }
}
