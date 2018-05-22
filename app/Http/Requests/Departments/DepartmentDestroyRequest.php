<?php

namespace App\Http\Requests\Departments;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use App\Employee;
use Illuminate\Http\Request;

class DepartmentDestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [];
    }

    /**
     * @param \Illuminate\Validation\Validator $validator
     */
    public function withValidator(\Illuminate\Validation\Validator $validator)
    {
        $validator->after(function ($validator) {
            $department = \Route::getCurrentRoute()->parameters()['department'];
            // 入力値とは関係ないが誰かしら設定している社員がいる場合はエラーを返す
            if (Employee::where('department_id', $department->id)->count() > 0) {
                $validator->errors()->add('id', trans('validation.custom.exists-department-id-in-employee'));
            }
        });
    }
}
