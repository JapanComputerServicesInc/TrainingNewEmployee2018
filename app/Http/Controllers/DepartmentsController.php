<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use App\Http\Requests\Departments\DepartmentCreateRequest;
use App\Http\Requests\Departments\DepartmentUpdateRequest;
use App\Http\Requests\Departments\DepartmentDestroyRequest;

class DepartmentsController extends Controller
{
    /**
     * 一覧表示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $departments = Department::paginate(10);

        return view('departments.index')->with(['departments' => $departments]);
    }

    /**
     * 新規登録画面表示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function new()
    {
        return view('departments.new');
    }

    /**
     * 新規登録
     * @param DepartmentCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(DepartmentCreateRequest $request)
    {
        $department = Department::create([
            'name' => $request->name
        ]);

        $request->session()->flash('success_message', '登録が完了しました。');

        return redirect()->route('departments.edit', ['id' => $department->id]);
    }

    /**
     * 編集画面表示
     * @param Department $department
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Department $department)
    {
        return view('departments.edit')->with(['department' => $department]);
    }

    /**
     * 更新
     * @param DepartmentUpdateRequest $request
     * @param Department $department
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DepartmentUpdateRequest $request, Department $department)
    {
        $department->update(['name' => $request->name]);

        $request->session()->flash('success_message', '更新が完了しました。');

        return redirect()->route('departments.edit', ['id' => $department->id]);
    }

    /**
     * 削除
     * @param DepartmentDestroyRequest $request
     * @param Department $department
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(DepartmentDestroyRequest $request, Department $department)
    {
        $department->delete();

        $request->session()->flash('success_message', '削除が完了しました。');

        return redirect()->route('departments.index');
    }
}
