<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class EmployeeCreateRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'employee_no' => ['required', 'digits:8', 'unique:employees,employee_no', function ($attribute, $value, $fail) {
                if (intval($value) < 10000000) {
                    return $fail(trans('validation.custom.minimum-intval'));
                }
            }],
            'name' => 'required|max:50'
        ];
    }
}
